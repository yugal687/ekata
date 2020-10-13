<template>
  <div>
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="row d-flex justify-content-center">
          <div class="categoryBtn btn btn-primary">Add Postal's Detail</div>
        </div>
      </div>
    </div>
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
      statusForm: {
        status: "",
      },
      status: [],

      isEditPostalCode: "",
    };
  },
};
</script>

<style scoped>
.container-fluid .row {
  margin-left: 0;
  margin-right: 0;
}

/* .hidden {
  display: none;
} */

.box-card-slide {
  margin-top: 20px;
  border: 1px solid #ebeef5;
  background-color: #fff;
  color: #303133;
  border-radius: 4px;
  overflow: hidden;
  box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);
}

.box-card-slide .box-header {
  padding: 18px 20px;
  border-bottom: 1px solid #ebeef5;
  box-sizing: border-box;
}

.box-card-slide .box-body {
  padding: 20px;
}
</style>
