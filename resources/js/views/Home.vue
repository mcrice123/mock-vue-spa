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

                <!-- Add to stream form -->
                <add-to-stream @completed="addStatus"></add-to-stream>

            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import Status from '../models/Status';
    import AddToStream from '../components/AddToStream';

    export default {
        components: {
            AddToStream
        },
        data() {
            return {
                statuses: []
            }
        },
        filters: {
            ago(date) {
                return moment(date).fromNow();
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
        methods: {
            addStatus(status) {
                this.statuses.unshift(status); // same as push, except pushes it at BEGINNING of array, not the end!

                alert('Your status has been added to the stream');
                window.scrollTo(0,0);
            }
        }
    }
</script>