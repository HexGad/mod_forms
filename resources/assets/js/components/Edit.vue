<template>
  <Builder @form="setForm" :formData="form">
    <template #saveButton>
      <button class="btn btn-primary btn-sm w-100" @click="updateForm" :data-kt-indicator="is_loading? 'on':'off'" :disabled="is_loading">
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
import Builder from "./FormBuilder/Builder.vue";

export default {
  name: "Edit",
  components: {Builder},
  props: {
    formData: {required: true}
  },
  created() {
    this.form = Object.assign({}, this.formData)
  },
  data: () => ({
    is_loading: false,
    form: {
      name: null,
    },
    errors: {
      name: null
    }
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
    async updateForm() {
      this.errors.name = null;
      this.is_loading = true;

      await axios.patch(route('dashboard.forms.update', this.formData.id), this.form).then((res) => {
        window.location.href = route('dashboard.forms.index')
      }).catch((err) => {
        if (err.response && err.response.status === 422)
          this.errors = Object.assign(this.errors, err.response.data.errors);

        this.is_loading = false;
      });
    }
  }
}
</script>
