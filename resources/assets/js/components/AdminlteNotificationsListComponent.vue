<template>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ notifications.have_message }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <ul class="products-list product-list-in-box">
                <li class="item" v-for="notification in notifications.data">
                    <div class="product-img">
                        <a :href="notification.url">
                            <img :src="notification.image" :alt="notification.title">
                        </a>
                    </div>
                    <div class="product-info">
                        <a :href="notification.url" class="product-title">
                            {{ notification.title }}
                            <span class="pull-right">{{ notification.date }}</span>
                        </a>
                        <span class="product-description">
                            <a :href="notification.url">
                                {{ notification.body }}
                            </a>
                        </span>
                    </div>
                </li>
                <!-- /.item -->
                <li class="footer"
                    v-if="notifications.links.prev || notifications.links.next">
                    <br>
                    <nav>
                        <ul class="pager">
                            <li v-if="notifications.links.prev">
                                <a @click.prevent="paginate(notifications.links.prev)">
                                    {{ notifications.previous_message }}
                                </a>
                            </li>
                            <li v-if="notifications.links.next">
                                <a @click.prevent="paginate(notifications.links.next)">
                                    {{ notifications.next_message }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </li>
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
</template>

<script>
    export default {
        props: ['translation', 'route'],
        data() {
            return {
                trans: [],
                notifications: [],
            }
        },
        methods:{
            paginate: function (url) {
                axios.get(url).then((response) => {
                    this.notifications = response.data;
                });
            }
        },
        created() {
            this.trans = JSON.parse(this.translation)

            axios.get(this.route).then((response) => {
                this.notifications = response.data;
            });
        }
    }
</script>
