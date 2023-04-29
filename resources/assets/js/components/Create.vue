<template>
  <Builder @form="setForm" :form-data="form">
    <template #saveButton>
      <button class="btn btn-primary btn-sm w-100" @click="createForm" :data-kt-indicator="is_loading? 'on':'off'" :disabled="is_loading">
        <span class="indicator-label">
              Save Changes
        </span>
        <span class="indicator-progress">Please wait...
              <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
      </button>
    </template>
  </Builder>
</template>

<script>
import draggable from 'vuedraggable'
import Builder from "./FormBuilder/Builder.vue";

export default {
  name: "Create",
  components: {Builder},
  data: () => ({
    is_loading: false,
    form: {
      title: 'Contact Form',
      description: 'Please leave your message and we will contact you ASAP',
      submit_button_text: 'Send',
      submit_action: 'redirect',
      redirection_url: '',
      submit_message: 'Amazing, we saved your answers. Thank you for your time and have a great day!',
      properties:[{"width":"100","hidden":false,"name":"Name","type":"text","uuid":"b0242838-85c5-46c4-8ae3-57cbe874ded9"},{"width":"100","type":"email","name":"Email","hidden":false,"uuid":"be35d32d-0ea4-496d-9f08-184a6f57e4f8"},{"width":"100","type":"phone","name":"Phone Number","hidden":false,"uuid":"94855665-3daa-4d47-80fb-24ac34d604a1"}],
    },
  }),
  mounted() {
    setTimeout(() => {
      document.body.setAttribute('data-kt-app-sidebar-minimize', 'on')
    }, 500);
  },

  methods: {
    setForm(form) {
      this.form = form;
    },
    async createForm() {
      this.is_loading = true;
      this.errors = {name: null};

      await axios.post(route('dashboard.forms.store'), this.form).then((res) => {
        window.location.href = route('dashboard.forms.index')
      }).catch((err) => {
        if (err.response && err.response.status === 422)
          this.errors = Object.assign(this.errors, err.response.data.errors);

        this.is_loading = false;
      });

    },
  },
}
</script>
<style>

.flip-list-move {
  transition: transform 0.5s;
}

.no-move {
  transition: transform 0s;
}

.ghost {
  opacity: 0.3;
  background: #eee;
}

.list-group {
  min-height: 20px;
}

.list-group-item i {
  cursor: pointer;
}
</style>
