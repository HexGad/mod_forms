export const blocks = [
    {
        name: "Input Blocks",
        blocks: [
            {
                icon: 'fa-solid fa-align-left',
                name: 'text',
                description: 'Text Input',
                property: {
                    hidden:false,
                    name:"Your name",
                    type:"text",
                }
            },
            {
                icon: 'fa-regular fa-calendar-days',
                name: 'date',
                description: 'Date Input',
                property: {
                    type: "date",
                    name: "Date",
                    hidden: false
                }
            },
            {
                icon: 'fa-solid fa-link',
                name: 'url',
                description: 'Url Input',
                property: {
                    type: "url",
                    name: "Link",
                    hidden: false
                }
            },
            {
                icon: 'fa-solid fa-phone',
                name: 'phone',
                description: 'Phone Input',
                property: {
                    type: "phone",
                    name: "Phone Number",
                    hidden: false
                }
            },
            {
                icon: 'fa-solid fa-align-left',
                name: 'email',
                description: 'Email Input',
                property: {
                    type: "email",
                    name: "Email",
                    hidden: false
                }
            },
            {
                icon: 'fa-solid fa-at',
                name: 'checkbox',
                description: 'Checkbox Input',
                property: {
                    type: "checkbox",
                    name: "Checkbox",
                    hidden: false
                }
            },
            {
                icon: 'fa-solid fa-bars',
                name: 'select',
                description: 'Select Input',
                property: {
                    type: "select",
                    name: "Select",
                    hidden: false,
                    options: [
                        {
                            id:'my_first_option',
                            name:"My First Option"
                        }
                    ]
                }
            },
            {
                icon: 'fa-solid fa-bars',
                name: 'multiselect',
                description: 'Multi Select Input',
                property: {
                    type: "multiselect",
                    name: "Multi Select",
                    hidden: false,
                    options: [
                        {
                            id:'my_first_option',
                            name:"My First Option"
                        }
                    ]
                }
            },
            {
                icon: 'fa-solid fa-hashtag',
                name: 'number',
                description: 'Number Input',
                property: {
                    type: "number",
                    name: "Number",
                    hidden: false
                }
            },
            {
                icon: 'fa-solid fa-file-arrow-down',
                name: 'file',
                description: 'File Input',
                property: {
                    type: "files",
                    name: "Files",
                    hidden: false
                }
            },
        ]
    }, {
        name: "Layout Blocks",
        blocks: [
            {
                icon: 'fa-solid fa-align-left',
                name: 'text',
                description: 'Text Block',
                type: 'text_block'
            },
            {
                icon: 'fa-solid fa-minus',
                name: 'text',
                description: 'Divider Block',
                type: 'divider_block'
            },
            {
                icon: 'fa-regular fa-image',
                name: 'text',
                description: 'Image Block',
                type: 'image_block'
            },
            {
                icon: 'fa-solid fa-code',
                name: 'text',
                description: 'Code Block',
                type: 'code_block'
            },

        ]
    }

]
