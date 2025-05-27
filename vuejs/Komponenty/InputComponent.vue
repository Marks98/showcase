<template>
  <!-- Vlastní input, nastylovaný v Tailwindcss -->
  <div class="relative flex items-center w-full h-[56px] m-2">
    <input
      :type="type"
      :name="name"
      v-model="data"
      :placeholder="label"
      class="placeholder-transparent peer rounded-lg py-2.5 px-4 focus:outline-none border w-full h-[56px]"
      :class="{
        'border-gray-200 focus:border-blue-500 disabled:bg-white': !error,
        'border-red-500': error
      }"
      :disabled="disable"
    />
    <label
      :for="name"
      class="intern-500 absolute left-4 top-2 pointer-events-none transition-all text-base-content text-opacity-50 peer-placeholder-shown:top-4 text-[10px] peer-placeholder-shown:text-base w-full h-[56px]"
      :class="{ 'text-gray-400': disable }"
    >
      {{ label }}
      <span v-if="required" class="text-red-500">*</span>
    </label>
    <div v-if="data || error" class="-ml-6 cursor-pointer">
      <p v-if="!error && data" @click="removeData">X</p>
      <p v-if="error" class="text-red-500">!</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "InputComponent",
  // Definice props, datový typ popřípadě výchozí hodnota / jestli je prop povinný
  props: {
    name: {
      type: String,
      required: true
    },
    type: {
      type: String,
      default: "text"
    },
    modelValue: {
      type: String,
      default: null
    },
    label: {
      type: String,
      required: true
    },
    required: {
      type: Boolean,
      default: false
    },
    error: {
      type: Boolean,
      default: false
    },
    disable: {
      type: Boolean,
      default: false
    }
  },
  // Definice hodnoty inputu, nelze měnit hodnotu z props v komponentě "modelValue"
  data() {
    return {
      data: null
    };
  },
  watch: {
    modelValue(newVal) {
      this.data = newVal;
    },
    data(newVal) {
      this.$emit('update:modelValue', newVal);
    }
  },
  mounted() {
    // Pokud se value nerovná výchozí hodnotě, vložíme obsah textu do data
    if (this.modelValue != null) {
      this.data = this.modelValue;
    }
  },
  methods: {
    // Metoda pro mazání obsahu inputu
    removeData() {
      this.data = null;
    }
  }
};
</script>