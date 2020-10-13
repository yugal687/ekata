<template>
  <div>
    <h1>Hello Payment Credential Form</h1>
  </div>
</template>

<script>
export default {
  name: "postalCodeComponents",
  data() {
    return {
      paymentCredentialForm: {
        paymentType: "",
        secretKey: "",
        apiKey: "",
      },
    };
  },
};
</script>