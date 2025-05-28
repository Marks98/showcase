<template>
  <div id="calendar">
    <!-- Výpis aktuálního měsíce/roku a možnost měnit rozsah kalendáře -->
    <div id="header">
      <button @click="prevMonth">‹</button>
      <span>{{ monthName }} {{ currentYear }}</span>
      <button @click="nextMonth">›</button>
    </div>

    <!-- Výpis jednotlivých dnů v týdnu -->
    <div id="weekdays">
      <div v-for="day in weekdays" :key="day" id="weekday">{{ day }}</div>
    </div>

    <!-- Výpis dnů v měsíci, včetně prázdných polí pro zarovnání prvního dne na správný den v týdnu -->
    <div id="days">
      <div
          v-for="(day, index) in paddedDays"
          :key="index"
          :class="['day', { today: isToday(day) }]"
      >
        {{ day }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Calendar",
  data() {
    // Vrací aktuální měsíc, rok a dnešní datum pro výchozí zobrazení kalendáře
    const today = new Date();
    return {
      currentMonth: today.getMonth(),
      currentYear: today.getFullYear(),
      today,
      weekdays: ["Po", "Út", "St", "Čt", "Pá", "So", "Ne"]
    };
  },
  // výpočet reaktivních dat
  computed: {
    // Český název vybraného měsíce ve formátu "leden", "únor"...
    monthName() {
      return new Date(this.currentYear, this.currentMonth).toLocaleString("cs-CZ", {
        month: "long",
      });
    },
    // Počet dní v měsíci
    daysInMonth() {
      return new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
    },
    // Index prvního dne v měsíci (převedeno tak, aby pondělí mělo index 0)
    startDayIndex() {
      const day = new Date(this.currentYear, this.currentMonth, 1).getDay();
      return (day + 6) % 7; // převod neděle (0) → 6, pondělí (1) → 0 atd.
    },
    // Výpočet odsazení aktuálního měsíce od předchozího "padding"
    paddedDays() {
      const padding = Array(this.startDayIndex).fill("")
      const days = Array.from({ length: this.daysInMonth }, (_, i) => i + 1);
      return [...padding, ...days];
    },
  },
  methods: {
    nextMonth() {
      if (this.currentMonth === 11) {
        this.currentMonth = 0;
        this.currentYear++;
      } else {
        this.currentMonth++;
      }
    },
    prevMonth() {
      if (this.currentMonth === 0) {
        this.currentMonth = 11;
        this.currentYear--;
      } else {
        this.currentMonth--;
      }
    },
    // Pokud se v měsíci a roku nachází aktuální den, nastavíme mu třídu a den tak odlišíme
    isToday(day) {
      return (
          day &&
          this.currentMonth === this.today.getMonth() &&
          this.currentYear === this.today.getFullYear() &&
          day === this.today.getDate()
      );
    }
  },
};
</script>

<!-- Vlastní styly kalendáře -->
<style scoped>
#calendar {
  max-width: 300px;
  margin: auto;
  font-family: sans-serif;
}

#header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: bold;
  margin-bottom: 10px;
}

#weekdays, #days {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 5px;
}

#weekday {
  text-align: center;
  font-weight: bold;
}

.day {
  text-align: center;
  padding: 8px 0;
  background: #f0f0f0;
  border-radius: 4px;
}

.day.today {
  background: #007BFF;
  color: white;
  font-weight: bold;
}
</style>