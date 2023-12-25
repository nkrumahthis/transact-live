<template>
  <div>
    <h1>Transactions</h1>

    <div v-if="successMessage" class="alert alert-success">
      {{ successMessage }}
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>From Account</th>
          <th>To Account</th>
          <th>Description</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="transaction in transactions"
          :key="transaction.id"
          class="transaction-row"
          @click="showTransactionModal(transaction)"
        >
          <td>{{ transaction.id }}</td>
          <td>{{ transaction.from_account.name ?? "N/A" }}</td>
          <td>{{ transaction.to_account.name ?? "N/A" }}</td>
          <td>{{ transaction.description }}</td>
          <td>{{ transaction.amount }}</td>
          <td>{{ formatDate(transaction.created_at) }}</td>
        </tr>
      </tbody>
    </table>

    <transaction-modal
      v-model="showModal"
      :transaction="selectedTransaction"
      @close="showModal = false"
    />
  </div>
</template>

  <script>
import TransactionModal from "./components/TransactionModal.vue";

export default {
  components: {
    TransactionModal,
  },
  props: {
    transactions: {
      type: Array,
      required: true,
    },
    successMessage: {
      type: String,
      default: "",
    },
  },
  data() {
    return {
      showModal: false,
      selectedTransaction: null,
    };
  },
  methods: {
    showTransactionModal(transaction) {
      this.selectedTransaction = transaction;
      this.showModal = true;
    },
    formatDate(date) {
      return date.toLocaleString("en-US", {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
      });
    },
  },
  mounted() {
    Echo.channel("transactions-sync").listen("TransactionCreated", (data) => {
      console.log("data.transaction", data.transaction)
    });
  },
};
</script>

  <style scoped>
.transaction-row:hover {
  background-color: #f5f5f5;
  cursor: pointer;
}
</style>
