<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Ymigval\LaravelIndexnow\Facade\IndexNow;

/**
 * Publikování naplánovaných článků
 * Příkaz, který po zavolání publikuje naplánované články k publikaci. Následně upozorní vyhledávače přes IndexNow.
 */

class PublishArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publish:articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publikuje naplánované články';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Všechny články, které jsou naplánované k publikování (mají "published_at") a nejsou ještě publikované
        $articlesToPublish  = Article::where('state', 'new')
            ->whereNotNull('published_at')
            ->get();

        // Každý článek projdu a zjistím, jestli je datum publikace menší než okamžik spuštění
        foreach($articlesToPublish as $article){
            if($article->published_at && $article->published_at->lt(now())){
                $article->update([
                    'state' => 'published'
                ]);

                // V případě, že má být článek publikován, zavolám IndexNow, aby vyhledávač věděl o nové adrese
                IndexNow::submit(sprintf("/clanek/%s-%s", $article->id, Str::slug($article->lang->title)));
            }
        }
    }
}
