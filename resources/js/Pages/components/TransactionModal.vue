<template>
  <div
    class="modal fade"
    :id="modalId"
    tabindex="-1"
    aria-labelledby="transactionModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="transactionModalLabel">
            Transaction Details
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div v-if="transaction == null"><p>no transaction chosen</p></div>
          <div v-else>
            <p>ID: {{ transaction.id }}</p>
            <p>From Account: {{ transaction.from_account.name ?? "N/A" }}</p>
            <p>To Account: {{ transaction.to_account.name ?? "N/A" }}</p>
            <p>Description: {{ transaction.description }}</p>
            <p>Amount: {{ transaction.amount }}</p>
            <p>Date: {{ transaction.created_at }}</p>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            @click="$emit('close')"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

  <script>
export default {
  props: {
    transaction: {
      type: Object,
      required: false,
    },
  },
  computed: {
    modalId() {
      return `transactionModal-${this.transaction ? this.transaction.id : "null"}`;
    },
  },
};
</script>
