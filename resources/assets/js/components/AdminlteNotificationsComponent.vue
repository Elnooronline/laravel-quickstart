<template>
    <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-danger">{{ notifications.count || '' }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">{{ notifications.have_message }}</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li v-for="notification in notifications.data"><!-- start message -->
                        <a :href="notification.url">
                            <div class="pull-left">
                                <img :src="notification.image" class="img-circle" :alt="notification.title">
                            </div>
                            <h4>
                                {{ notification.title }}
                                <small><i class="fa fa-clock-o"></i> {{ notification.date }}</small>
                            </h4>
                            <p>{{ notification.body }}</p>
                        </a>
                    </li>
                    <!-- end message -->
                </ul>
            </li>
            <li class="footer">
                <a :href="notifications.all_url">
                    {{ notifications.all_message }}
                </a>
            </li>
        </ul>
    </li>
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
        created() {
            this.trans = JSON.parse(this.translation)

            axios.get(this.route).then((responce) => {
                this.notifications = responce.data;
            });
        }
    }
</script>
