<template>
  <!-- Hlavní kontejner notifikace. Třída je dynamicky přiřazena dle typu (success, error, atd.) a stylována pomocí CSS -->
  <div v-if="visible" :class="['notification', type]">
    <span class="message">{{ message }}</span>
    <button class="close" @click="close">×</button>
  </div>
</template>

<script>
export default {
  name: 'Notification',
  // Výchozí props, které komponenta Notification přijímá
  props: {
    message: {
      type: String,
      required: true,
    },
    type: {
      type: String,
      default: 'info',
    },
    duration: {
      type: Number,
      default: 3000,
    },
  },
  data() {
    return {
      visible: true,
    };
  },
  // Jakmile se komponenta moutne, spustí se časovač s daným trváním, poté se komponenta skryje
  mounted() {
    setTimeout(this.close, this.duration);
  },
  methods: {
    // Přepne viditelnost divu a emitne stav "close" do App.vue
    close() {
      this.visible = false;
      this.$emit('close');
    },
  },
};
</script>

<style>
.notification {
  padding: 1em;
  margin: 1em;
  border-radius: 5px;
  color: white;
  position: relative;
  transition: opacity 0.3s ease;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.notification.success {
  background-color: #4caf50;
}

.notification.error {
  background-color: #f44336;
}

.notification.info {
  background-color: #2196f3;
}

.notification.warning {
  background-color: #ff9800;
}

.close {
  background: none;
  border: none;
  color: white;
  font-size: 1.2em;
  cursor: pointer;
}
</style>