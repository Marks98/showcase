<script>

//Inicializace TailwindCSS pro možnost ověření funkčnosti například ve Vue SFC Playground ( V projektu se načítá přes build)

const tailwindScript = document.createElement('script')
tailwindScript.setAttribute('src', 'https://cdn.tailwindcss.com')
document.head.appendChild(tailwindScript);

//Import vlastní komponenty Input
import InputComponent from './InputComponent.vue';

// Registrace vlastní komponenty
export default{
  components: {
    InputComponent
  },
  data(){
    return {
      exampleInput: null
    }
  }
}
</script>

<template>
    <!-- Vykreslení vlastní komponenty, předání required props  -->
    <InputComponent
        name="example-input"
        label="Example label"
        v-model="exampleInput"
      >
    </InputComponent>
</template>