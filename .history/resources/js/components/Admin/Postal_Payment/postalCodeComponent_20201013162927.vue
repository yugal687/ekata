<template>
  <div>
    <h1>Hello Postal Code Form</h1>
  </div>
</template>

<script>
export default {
  name: "postalCodeComponents",
  data() {
    return {
      postalCodeForm: {
        postalCodeId: "",
        stateId: "",
        deliveryCharge: "",
      },
    };
  },
};
</script>