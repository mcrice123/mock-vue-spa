<template>
    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="message" v-for="status in statuses">
                    <div class="message-header">
                        <p>
                            {{ status.user.name }} said...
                        </p> 
                        <p>
                            <!--{{ postedOn(status) }} -->
                            {{ status.created_at | ago | capitalize }}
                        </p>
                    </div>

                    <div class="message-body" v-text="status.body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import Status from '../models/Status';

    export default {
        data() {
            return {
                statuses: []
            }
        },
        filters: {
            ago(date) {
                console.log(moment(status.created_at).fromNow());
                return moment(status.created_at).fromNow();
            },
            capitalize(value) {
                return value.toUpperCase();
            }
        },
        created() {
            // fire off an axax request
           // Status.all()
                //.then(({data}) => this.statuses = data);
            Status.all(statuses => this.statuses = statuses);
        },
        /*methods: {
            postedOn(status) {
                return moment(status.created_at).fromNow();
            }
        }*/
    }
</script>