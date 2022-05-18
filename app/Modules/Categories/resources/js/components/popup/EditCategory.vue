<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable add edit" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать категорию</h5>
                <button type="button" class="btn-close" @click="closeShow"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="editThisCategory">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Название категории</label>
                            <input class="form-control" v-model="name" required>
                            <label>Родительская категория</label>
                            <select class="form-select" v-model="parent_category_id" required>
                                <option class="form-control" v-for="category in getCategories" :value="category.id">{{ category.name }}</option>
                            </select>
                            <label>Идентификатор категории</label>
                            <input class="form-control" v-model="slug" required>
                        </div>
                        <div class="col-md-6">
                            <label>Описание категории</label>
                            <textarea class="form-control" v-model="description" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Редактировать категорию</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
import {mapActions, mapGetters} from "vuex";

export default {
    props:{
        category: null,
    },
    name: "EditCategory",
    computed:{
        ...mapGetters({
            'getCategories':'categoriesModule/getCategories',
        }),
    },
    data(){
        return {
            id: this.category.id,
            name: this.category.name,
            parent_category_id: this.category.parent_category_id,
            description: this.category.description,
            slug: this.category.slug,
        }
    },
    watch:{
        name(value){
            this.slug = this.url_slug(value)
        }
    },
    methods:{
        ...mapActions({
            'fetchCategories': "categoriesModule/fetchCategories",
            'editCategory': "categoriesModule/editCategory",
        }),
        closeShow: function (){
            this.$emit('closePopup')
        },
        editThisCategory: function (){

            const category = {
                id: this.id,
                name: this.name,
                parent_category_id: this.parent_category_id,
                slug: this.slug,
                description: this.description
            }

            this.editCategory(category).then((resp) => {
                console.log(resp);

                this.closeShow();
                this.fetchCategories()
            })
        },
        url_slug: function (s, opt){
            s = String(s);
            opt = Object(opt);

            var defaults = {
                'delimiter': '-',
                'limit': undefined,
                'lowercase': true,
                'replacements': {},
                'transliterate': true,
            };

            // Merge options
            for (var k in defaults) {
                if (!opt.hasOwnProperty(k)) {
                    opt[k] = defaults[k];
                }
            }

            var char_map = {
                // Russian
                'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D', 'Е': 'E', 'Ё': 'Yo', 'Ж': 'Zh',
                'З': 'Z', 'И': 'I', 'Й': 'J', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N', 'О': 'O',
                'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T', 'У': 'U', 'Ф': 'F', 'Х': 'H', 'Ц': 'C',
                'Ч': 'Ch', 'Ш': 'Sh', 'Щ': 'Sh', 'Ъ': '', 'Ы': 'Y', 'Ь': '', 'Э': 'E', 'Ю': 'Yu',
                'Я': 'Ya',
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'yo', 'ж': 'zh',
                'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
                'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'ts',
                'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu',
                'я': 'ya',
            };

            // Make custom replacements
            for (var k in opt.replacements) {
                s = s.replace(RegExp(k, 'g'), opt.replacements[k]);
            }

            // Transliterate characters to ASCII
            if (opt.transliterate) {
                for (var k in char_map) {
                    s = s.replace(RegExp(k, 'g'), char_map[k]);
                }
            }

            // Replace non-alphanumeric characters with our delimiter
            var alnum = RegExp('[^a-z0-9]+', 'ig');
            s = s.replace(alnum, opt.delimiter);

            // Remove duplicate delimiters
            s = s.replace(RegExp('[' + opt.delimiter + ']{2,}', 'g'), opt.delimiter);

            // Truncate slug to max. characters
            s = s.substring(0, opt.limit);

            // Remove delimiter from ends
            s = s.replace(RegExp('(^' + opt.delimiter + '|' + opt.delimiter + '$)', 'g'), '');

            return opt.lowercase ? s.toLowerCase() : s;
        }
    },
}
</script>

<style>
.edit{
    max-width: 935px;
}
.modal-footer{
    justify-content: end;
}
</style>
