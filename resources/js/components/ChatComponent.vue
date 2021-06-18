<template>
  <div>
    <div class="card-header">チャットルーム</div>
    <div
      class="card"
      style="width: auto; height: 550px; overflow: auto"
      id="sc"
      v-chat-scroll
    >
      <div class="panel panel-default">
        <div class="panel-body">
          <div>
            <div class="container">
              <div
                class="row message-bubble"
                v-for="(message, key) in messages"
                :key="key"
              >
                <p class="text-muted">{{ message.user.name }}</p>
                <span>{{ message.message }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="input-group mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="message"
        aria-label="message"
        aria-describedby="button-addon2"
        v-model="text"
      />
      <div class="input-group-append">
        <button
          class="btn btn-primary"
          type="submit"
          @click="postMessage"
          :disabled="!textExists"
        >
          <i class="fa fa-paper-plane"></i>
        </button>
      </div>
    </div>

  </div>
</template>

<style>
.message-bubble {
  padding: 10px 0px 10px 0px;
}

.message-bubble:nth-child(even) {
  background-color: #f5f5f5;
}

.message-bubble > * {
  padding-left: 10px;
}

.panel-body {
  padding: 0px;
}

.panel-heading {
  background-color: #3d6da7 !important;
  color: white !important;
}
</style>

 

<script>
// スクロールを下に固定する
import VueChatScroll from "vue-chat-scroll";
Vue.use(VueChatScroll);

export default {
  data() {
    return {
      text: "",
      messages: [],
    };
  },
  computed: {
    textExists() {
      return this.text.length > 0;
    },
  },
  mounted() {
    this.getAuth();
    this.fetchMessages();
    Echo.private("laravel_chat").listen("MessageSent", (e) => {
      this.fetchMessages();
    });
  },
  methods: {
    fetchMessages() {
      axios.get("/messages").then((response) => {
        this.messages = response.data;
        //console.log(response.data);
      });
    },
    postMessage(message) {
      axios.post("/messages", { message: this.text }).then((response) => {
        this.text = "";
      });
      $(".card").animate({ scrollTop: $(document).height() * 1000 }, "fast");
    },
    getAuth() {
      axios.get("/getauth").then((response) => {
        console.log(response.data.id);
      });
    },
  },
};
</script>
