<template>
    <div>
        <input v-model="pickedElement.id" type="hidden" ref="category_id" :name="filed_name">
        <input type="text" v-model="query" @keyup="search()" class="form-control">
        <div v-if="picked">
            <div class="element" v-for="element in filtered" @click="pickCategory(element)">
                {{element.name}}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "categories",
        props: ['items', 'filed_name', 'selected'],
        data () {
            return  {
                query: '',
                filtered: [],
                picked: true,
                pickedElement: {
                    id: 0,
                    name: ''
                }
            }
        },
        methods: {
            pickCategory: function (category) {
                this.query = category.name
                this.picked = false
                this.$refs.category_id.value = category.id
                this.pickedElement.id = category.id
            },
            search () {
                console.log(this.query)
                if(this.query == '') {
                    this.picked = false
                    return
                }
                this.picked = true
                this
                    .filtered = this
                    .items
                    .filter(item => item.name.indexOf(this.query) !== -1)
            }
        },
        created () {
            if(this.selected) {
                this.pickedElement = this.selected
                this.query = this.selected.name
            }
        }
    }
</script>

<style scoped>
    .element {
        cursor: pointer;
    }
    .element:hover {
        background: #cacaca;
    }
</style>