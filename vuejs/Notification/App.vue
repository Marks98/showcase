<template>
  <div>
    <!-- Tlačítka pro vyzkoušení jednolivých typů notifikací -->
    <button @click="showNotification('Success notifikace', 'success')">Success</button>
    <button @click="showNotification('Error notifikace', 'error')">Error</button>
    <button @click="showNotification('Info notifikace', 'info')">Info</button>
    <button @click="showNotification('Warning notifikace', 'warning')">Warning</button>

    <!-- Možnost nastavit vlastní délku trvání notifikace (hodnoty jsou v milisekundách) -->
    <div style="margin-top: 20px;">
      <label for="duration">
        Trvání notifikace [ms]
      </label>
      <input type="number" name="duration" v-model="duration">
    </div>

    <!-- Výpis komponenty Notifikace -->
    <Notification
        v-for="(notif, index) in notifications"
        :key="index"
        :message="notif.message"
        :type="notif.type"
        :duration="notif.duration"
        @close="removeNotification(index)"
    />
  </div>
</template>

<script>
import Notification from './Notification.vue';

export default {
  components: {
    Notification,
  },
  // Deklarace pole notifications a proměnné duration
  data() {
    return {
      notifications: [],
      duration: 3000
    };
  },
  // Metody pro zobrazení a odebrání notifikace
  methods: {
    showNotification(message, type) {
      // Ochrana proti zadání záporného trvání notifikace
      if(this.duration < 0){
        this.duration = 3000;
      }
      this.notifications.push({ message, type, duration: this.duration });
    },
    removeNotification(index) {
      this.notifications.splice(index, 1);
    },
  },
};
</script>
