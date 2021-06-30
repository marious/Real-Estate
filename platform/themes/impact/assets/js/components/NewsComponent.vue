<template>
    <div class="news-wrap">
        <div class="half-circle-spinner" v-if="isLoading">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
        </div>
        <div class="row mb-5" v-if="!isLoading && data.length">
            <div class="col-xl-4 col-md-6 col-xs-12" v-for="item in data"
                 :key="item.id">
                <div class="news-item">
                    <a :href="item.url" class="news-img-link" :title="item.name">
                        <div class="news-item-img">
                            <img class="img-responsive" :src="item.image" :alt="item.name">
                        </div>
                    </a>
                    <div class="news-item-text">
                        <a :href="item.url" :title="item.name"><h3>{{ item.name }}</h3></a>
                        <div class="news-item-descr big-news">
                            <p>{{ item.description }}</p>
                        </div>
                        <div class="news-item-bottom">
                            <a :href="item.url" class="news-link" title="المزيد">قراءة المزيد...</a>
                            <div class="admin">
                            </div>
                        </div>
                    </div>
                </div>
            </div >
        </div>
    </div>
</template>
<script>
export default {
    data: function() {
        return {
            isLoading: true,
            data: []
        };
    },

    mounted() {
        this.getData();
    },

    props: {
        url: {
            type: String,
            default: () => null,
            required: true
        }
    },

    methods: {
        getData() {
            this.data = [];
            this.isLoading = true;
            axios.get(this.url).then(res => {
                this.data = res.data.data;
                this.isLoading = false;
            });
        }
    }
};
</script>
