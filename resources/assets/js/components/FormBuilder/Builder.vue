<template>
  <div class="row align-items-start">
    <div class="col-4">
      <div class="card">
        <div class="card-body p-0 py-5">
          <h3 class="px-5 mb-0">{{form.title}}</h3>
          <div class="action-wrapper p-5">
            <button class="btn btn-primary btn-sm w-100"> Save Changes</button>
          </div>
          <div class="sections">
            <div class="accordion">

              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button fs-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" class="me-2 inline mr-2 -mt-1 text-blue-600"><path d="M10 13.3332V9.99984M10 6.6665H10.0083M18.3333 9.99984C18.3333 14.6022 14.6024 18.3332 10 18.3332C5.39763 18.3332 1.66667 14.6022 1.66667 9.99984C1.66667 5.39746 5.39763 1.6665 10 1.6665C14.6024 1.6665 18.3333 5.39746 18.3333 9.99984Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    Information
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="">
                  <div class="accordion-body pt-0">
                    <div class="form-group mb-4">
                      <label class="required form-label fw-bolder mb-0">Form Title</label>
                      <input type="text" class="form-control" v-model="form.title">
                    </div>
                    <div class="form-group mb-4">
                      <label class="form-label fw-bolder mb-0">Description</label>
                      <textarea type="text" class="form-control" v-model="form.description"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button fs-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" class="me-2 inline mr-2 -mt-1 text-blue-600"><path d="M13.8333 7.33333C14.7668 7.33333 15.2335 7.33333 15.59 7.15168C15.9036 6.99189 16.1586 6.73692 16.3183 6.42332C16.5 6.0668 16.5 5.60009 16.5 4.66667V4.16667C16.5 3.23325 16.5 2.76654 16.3183 2.41002C16.1586 2.09641 15.9036 1.84145 15.59 1.68166C15.2335 1.5 14.7668 1.5 13.8333 1.5L4.16667 1.5C3.23325 1.5 2.76654 1.5 2.41002 1.68166C2.09641 1.84144 1.84144 2.09641 1.68166 2.41002C1.5 2.76654 1.5 3.23325 1.5 4.16667L1.5 4.66667C1.5 5.60009 1.5 6.0668 1.68166 6.42332C1.84144 6.73692 2.09641 6.99189 2.41002 7.15168C2.76654 7.33333 3.23325 7.33333 4.16667 7.33333L13.8333 7.33333Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path><path d="M13.8333 16.5C14.7668 16.5 15.2335 16.5 15.59 16.3183C15.9036 16.1586 16.1586 15.9036 16.3183 15.59C16.5 15.2335 16.5 14.7668 16.5 13.8333V13.3333C16.5 12.3999 16.5 11.9332 16.3183 11.5767C16.1586 11.2631 15.9036 11.0081 15.59 10.8483C15.2335 10.6667 14.7668 10.6667 13.8333 10.6667L4.16667 10.6667C3.23325 10.6667 2.76654 10.6667 2.41002 10.8483C2.09641 11.0081 1.84144 11.2631 1.68166 11.5767C1.5 11.9332 1.5 12.3999 1.5 13.3333L1.5 13.8333C1.5 14.7668 1.5 15.2335 1.68166 15.59C1.84144 15.9036 2.09641 16.1586 2.41002 16.3183C2.76654 16.5 3.23325 16.5 4.16667 16.5H13.8333Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    Form Structure
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="">
                  <div class="accordion-body pt-0">
                    <div class="blocks">
                      <draggable
                          class="list-group"
                          tag="div"
                          handle=".handle"
                          :component-data="{
                            tag: 'ul',
                            type: 'transition-group',
                            name: !drag ? 'flip-list' : null
                          }"
                          v-model="form.properties"
                          v-bind="dragOptions"
                          @start="drag = true"
                          @end="drag = false"
                          item-key="order"
                      >
                        <template #item="{ element, index }">
                          <li class="list-group-item">
                            <div class="d-flex align-items-center">
                              <div class="handle">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                              </div>
                              <div class="info d-flex flex-column ms-4 flex-grow-1">
                                <input type="text" class="border-0 shadow-none outline-none fs-5 px-2" :value="element.name" @input="($e) => form.properties[index].name = $e.target.value">
                                <small class="text-muted px-2">{{element.type}}</small>
                              </div>
                              <div class="actions d-flex">
                                <div class="btn btn-outline-secondary btn-icon btn-sm hide-input" @click="form.properties[index].hidden = !form.properties[index].hidden">
                                  <svg v-if="form.properties[index].hidden" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                  <svg v-else width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"><g clip-path="url(#clip0_1027_7292)"><path d="M9.9 4.24C10.5883 4.07888 11.2931 3.99834 12 4C19 4 23 12 23 12C22.393 13.1356 21.6691 14.2047 20.84 15.19M14.12 14.12C13.8454 14.4147 13.5141 14.6512 13.1462 14.8151C12.7782 14.9791 12.3809 15.0673 11.9781 15.0744C11.5753 15.0815 11.1752 15.0074 10.8016 14.8565C10.4281 14.7056 10.0887 14.481 9.80385 14.1962C9.51897 13.9113 9.29439 13.5719 9.14351 13.1984C8.99262 12.8248 8.91853 12.4247 8.92563 12.0219C8.93274 11.6191 9.02091 11.2218 9.18488 10.8538C9.34884 10.4859 9.58525 10.1546 9.88 9.88M1 1L23 23M17.94 17.94C16.2306 19.243 14.1491 19.9649 12 20C5 20 1 12 1 12C2.24389 9.6819 3.96914 7.65661 6.06 6.06L17.94 17.94Z" stroke="grey" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><clipPath id="clip0_1027_7292"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg>
                                </div>
                                <div class="btn btn-outline-secondary btn-icon btn-sm make-required" :class="{'is_required': form.properties[index].required }" @click="form.properties[index].required = !form.properties[index].required">
                                  <svg width="13" height="13" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2V12M12 12V22M12 12L4.93 4.93M12 12L19.07 19.07M12 12H2M12 12H22M12 12L4.93 19.07M12 12L19.07 4.93" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                </div>
                                <div class="btn btn-outline-secondary btn-icon btn-sm configure-input">
                                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1027_7210)"><path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19.4 15C19.2669 15.3016 19.2272 15.6362 19.286 15.9606C19.3448 16.285 19.4995 16.5843 19.73 16.82L19.79 16.88C19.976 17.0657 20.1235 17.2863 20.2241 17.5291C20.3248 17.7719 20.3766 18.0322 20.3766 18.295C20.3766 18.5578 20.3248 18.8181 20.2241 19.0609C20.1235 19.3037 19.976 19.5243 19.79 19.71C19.6043 19.896 19.3837 20.0435 19.1409 20.1441C18.8981 20.2448 18.6378 20.2966 18.375 20.2966C18.1122 20.2966 17.8519 20.2448 17.6091 20.1441C17.3663 20.0435 17.1457 19.896 16.96 19.71L16.9 19.65C16.6643 19.4195 16.365 19.2648 16.0406 19.206C15.7162 19.1472 15.3816 19.1869 15.08 19.32C14.7842 19.4468 14.532 19.6572 14.3543 19.9255C14.1766 20.1938 14.0813 20.5082 14.08 20.83V21C14.08 21.5304 13.8693 22.0391 13.4942 22.4142C13.1191 22.7893 12.6104 23 12.08 23C11.5496 23 11.0409 22.7893 10.6658 22.4142C10.2907 22.0391 10.08 21.5304 10.08 21V20.91C10.0723 20.579 9.96512 20.258 9.77251 19.9887C9.5799 19.7194 9.31074 19.5143 9 19.4C8.69838 19.2669 8.36381 19.2272 8.03941 19.286C7.71502 19.3448 7.41568 19.4995 7.18 19.73L7.12 19.79C6.93425 19.976 6.71368 20.1235 6.47088 20.2241C6.22808 20.3248 5.96783 20.3766 5.705 20.3766C5.44217 20.3766 5.18192 20.3248 4.93912 20.2241C4.69632 20.1235 4.47575 19.976 4.29 19.79C4.10405 19.6043 3.95653 19.3837 3.85588 19.1409C3.75523 18.8981 3.70343 18.6378 3.70343 18.375C3.70343 18.1122 3.75523 17.8519 3.85588 17.6091C3.95653 17.3663 4.10405 17.1457 4.29 16.96L4.35 16.9C4.58054 16.6643 4.73519 16.365 4.794 16.0406C4.85282 15.7162 4.81312 15.3816 4.68 15.08C4.55324 14.7842 4.34276 14.532 4.07447 14.3543C3.80618 14.1766 3.49179 14.0813 3.17 14.08H3C2.46957 14.08 1.96086 13.8693 1.58579 13.4942C1.21071 13.1191 1 12.6104 1 12.08C1 11.5496 1.21071 11.0409 1.58579 10.6658C1.96086 10.2907 2.46957 10.08 3 10.08H3.09C3.42099 10.0723 3.742 9.96512 4.0113 9.77251C4.28059 9.5799 4.48572 9.31074 4.6 9C4.73312 8.69838 4.77282 8.36381 4.714 8.03941C4.65519 7.71502 4.50054 7.41568 4.27 7.18L4.21 7.12C4.02405 6.93425 3.87653 6.71368 3.77588 6.47088C3.67523 6.22808 3.62343 5.96783 3.62343 5.705C3.62343 5.44217 3.67523 5.18192 3.77588 4.93912C3.87653 4.69632 4.02405 4.47575 4.21 4.29C4.39575 4.10405 4.61632 3.95653 4.85912 3.85588C5.10192 3.75523 5.36217 3.70343 5.625 3.70343C5.88783 3.70343 6.14808 3.75523 6.39088 3.85588C6.63368 3.95653 6.85425 4.10405 7.04 4.29L7.1 4.35C7.33568 4.58054 7.63502 4.73519 7.95941 4.794C8.28381 4.85282 8.61838 4.81312 8.92 4.68H9C9.29577 4.55324 9.54802 4.34276 9.72569 4.07447C9.90337 3.80618 9.99872 3.49179 10 3.17V3C10 2.46957 10.2107 1.96086 10.5858 1.58579C10.9609 1.21071 11.4696 1 12 1C12.5304 1 13.0391 1.21071 13.4142 1.58579C13.7893 1.96086 14 2.46957 14 3V3.09C14.0013 3.41179 14.0966 3.72618 14.2743 3.99447C14.452 4.26276 14.7042 4.47324 15 4.6C15.3016 4.73312 15.6362 4.77282 15.9606 4.714C16.285 4.65519 16.5843 4.50054 16.82 4.27L16.88 4.21C17.0657 4.02405 17.2863 3.87653 17.5291 3.77588C17.7719 3.67523 18.0322 3.62343 18.295 3.62343C18.5578 3.62343 18.8181 3.67523 19.0609 3.77588C19.3037 3.87653 19.5243 4.02405 19.71 4.21C19.896 4.39575 20.0435 4.61632 20.1441 4.85912C20.2448 5.10192 20.2966 5.36217 20.2966 5.625C20.2966 5.88783 20.2448 6.14808 20.1441 6.39088C20.0435 6.63368 19.896 6.85425 19.71 7.04L19.65 7.1C19.4195 7.33568 19.2648 7.63502 19.206 7.95941C19.1472 8.28381 19.1869 8.61838 19.32 8.92V9C19.4468 9.29577 19.6572 9.54802 19.9255 9.72569C20.1938 9.90337 20.5082 9.99872 20.83 10H21C21.5304 10 22.0391 10.2107 22.4142 10.5858C22.7893 10.9609 23 11.4696 23 12C23 12.5304 22.7893 13.0391 22.4142 13.4142C22.0391 13.7893 21.5304 14 21 14H20.91C20.5882 14.0013 20.2738 14.0966 20.0055 14.2743C19.7372 14.452 19.5268 14.7042 19.4 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><clipPath id="clip0_1027_7210"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg>
                                </div>
                              </div>
                            </div>
                          </li>
                        </template>
                      </draggable>
                      <button class="btn btn-light btn-sm w-100 border-gray-500 my-2" style="border: 1px solid #eee;">
                        <i class="fa fa-plus"></i> Add Block
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button fs-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem"  class="me-2 inline mr-2 -mt-1 text-blue-600"><path d="M1.66667 9.99984C1.66667 14.6022 5.39763 18.3332 10 18.3332C11.3807 18.3332 12.5 17.2139 12.5 15.8332V15.4165C12.5 15.0295 12.5 14.836 12.5214 14.6735C12.6691 13.5517 13.5519 12.6689 14.6737 12.5212C14.8361 12.4998 15.0297 12.4998 15.4167 12.4998H15.8333C17.214 12.4998 18.3333 11.3805 18.3333 9.99984C18.3333 5.39746 14.6024 1.6665 10 1.6665C5.39763 1.6665 1.66667 5.39746 1.66667 9.99984Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path><path d="M5.83333 10.8332C6.29357 10.8332 6.66667 10.4601 6.66667 9.99984C6.66667 9.5396 6.29357 9.1665 5.83333 9.1665C5.3731 9.1665 5 9.5396 5 9.99984C5 10.4601 5.3731 10.8332 5.83333 10.8332Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path><path d="M13.3333 7.49984C13.7936 7.49984 14.1667 7.12674 14.1667 6.6665C14.1667 6.20627 13.7936 5.83317 13.3333 5.83317C12.8731 5.83317 12.5 6.20627 12.5 6.6665C12.5 7.12674 12.8731 7.49984 13.3333 7.49984Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.33333 6.6665C8.79357 6.6665 9.16667 6.29341 9.16667 5.83317C9.16667 5.37293 8.79357 4.99984 8.33333 4.99984C7.8731 4.99984 7.5 5.37293 7.5 5.83317C7.5 6.29341 7.8731 6.6665 8.33333 6.6665Z" stroke="currentColor" stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    Customization
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="">
                  <div class="accordion-body pt-0">
                    <div class="form-group mb-4">
                      <label class="form-label fw-bolder mb-0">Submit Button Text</label>
                      <input type="text" class="form-control" v-model="form.submit_button_text">
                    </div>
                    <div class="form-group mb-4">
                      <label class="form-label fw-bolder mb-0">Post Submission Action</label>
                      <select class="form-control form-control-solid" v-model="form.submit_action">
                        <option value="redirect">Redirect</option>
                        <option value="message">Show Success Page</option>
                      </select>
                    </div>
                    <div class="form-group mb-4" v-if="form.submit_action === 'redirect'">
                      <label class="required form-label fw-bolder mb-0">Redirect URL</label>
                      <input type="text" class="form-control" v-model="form.redirection_url">
                    </div>
                    <div class="form-group mb-4" v-else>
                      <label class="required form-label fw-bolder mb-0">After Submission Text</label>
                      <textarea type="text" class="form-control" v-model="form.submit_message"></textarea>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-8  position-sticky" style="top: 70px;">
      <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid justify-content-center mb-3">
        <span class="form-check-label fw-semibold mx-2">Full Page Preview</span>
        <input class="form-check-input" type="checkbox" value="true" v-model="size">
        <span class="form-check-label fw-semibold mx-2">Preview Embed</span>
      </label>
      <div class="d-flex justify-content-center">
        <Preview :form="form" :embed="size"></Preview>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from 'vuedraggable'
import Preview from "./Preview.vue";

export default {
  name: "Builder",
  components: {
    Preview,
    draggable
  },
  data:()=>({
    drag: false,
    size: false,
    form:{
      title: 'Example Form',
      description: '',
      submit_button_text: 'Submit',
      submit_action: 'redirect',
      redirection_url: '',
      submit_message: 'Amazing, we saved your answers. Thank you for your time and have a great day!',

      properties:[
        {
          "id": "a494681d-b3c8-4f62-b5b4-f5ab586d51f1",
          "name": "Name",
          "type": "text",
          "hidden": false,
          "required": true,
          "help_text": "please enter Your name",
          "width": 50,
        }, {
          "id": "a494681d-b3c8-4f62-b5b4-f5ab586d51f2",
          "name": "Email",
          "type": "email",
          "hidden": false,
          "required": false,
          "help_text": "please enter a valid email",
          "width": 50,
        }, {
          "id": "a494681d-b3c8-4f62-b5b4-f5ab586d51f3",
          "name": "Message",
          "type": "text",
          "multiline": true,
          "hidden": false,
          "required": true,
          "help_text": "tell us your message",
          "width": 100,
        }
      ],
    },
    errors:{
      name: null
    }
  }),

  computed: {
    dragOptions() {
      return {
        animation: 200,
        group: "description",
        disabled: false,
        ghostClass: "ghost"
      };
    }
  },
  methods: {
    sort() {
      this.list = this.list.sort((a, b) => a.order - b.order);
    },
  }
}
</script>
