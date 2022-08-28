<template>
  <transition name="modal-fade">
    <div
      class="modal-overlay fixed flex justify-center z-1"
      @click="$emit('close-modal')"
    >
      <div class="modal text-center bg-white" @click.stop>
        <h6>Saved!</h6>
        <p>Your Details have been saved Successfully</p>
        <button>Go Home</button>
        <button @click="$emit('close-modal')">cancel</button>
      </div>
    </div>
  </transition>
</template>
<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: #000000da;
  z-index: 1;
}

.modal {
  text-align: center;
  background-color: white;
  height: 500px;
  width: 500px;
  margin-top: 10%;
  padding: 60px 0;
  border-radius: 20px;
}

.close-img {
  width: 25px;
}

.check {
  width: 150px;
}

h6 {
  font-weight: 500;
  font-size: 28px;
  margin: 20px 0;
}

p {
  font-size: 16px;
  margin: 20px 0;
}

button {
  background-color: #ac003e;
  width: 150px;
  height: 40px;
  color: white;
  font-size: 14px;
  border-radius: 16px;
  margin-top: 50px;
}
.modal-fade-enter,
.modal-fade-leave-to {
  opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
  transition: opacity 0.5s ease;
}
</style>
<script>
export default {
  name: "delPublishModal",
};
</script>