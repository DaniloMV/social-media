<template>
    <div class="section">
        <div class="container">
            <div class="row">
                <div v-if="showStory">
                    <h1 class="center-block">Loading</h1>
                </div>
                <div class="col-md-8 col-md-offset-2" v-else="">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#"><img class="media-object"
                                                                       src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png"
                                                                       height="64" width="64"></a>
                                    <div class="media-body">
                                        <h4 class="media-heading" v-text="user.name"></h4>
                                        <textarea placeholder="Make Your Story" class="form-control"
                                                  v-bind="story.text"></textarea>
                                        <br>
                                        <div class="btn-group btn-group-justified">
                                            <a href="#" class="btn btn-default"><i
                                                    class="fa fa-fw fa-photo"></i>Photo</a>
                                            <a href="#" class="btn btn-default"><i
                                                    class="fa fa-fw fa-video-camera"></i>Video</a>
                                            <button class="btn btn-default" @click="makePost"><i
                                                    class="fa fa-fw fa-check"></i>Post
                                            </button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showStory: false,
                user: {},
                story: {
                    text: '',
                    file: null
                },
                posts: {}
            }
        },
        mounted() {
            this.getUser();
        },
        methods: {
            getUser() {
                this.$http.get('/api/user/').then((response) => {
                    this.user = response.data;
                    this.showStory = true;
                }, (response) => {
                    console.error(response.bodyText);
                });
            },
            makePost() {
                this.$http.post('/api/post/make').then((response) => {
                    this.user = response.data;
                }, (response) => {
                    console.error(response.bodyText);
                });
            }
        }
    }
</script>
