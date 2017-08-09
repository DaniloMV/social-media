<template>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#"><img class="media-object"
                                                                       src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png"
                                                                       height="64" width="64"></a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Media heading</h4>
                                        <img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png"
                                             class="img-responsive">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <ul class="media-list">
                                <li class="media">
                                    <a class="pull-left" href="#"><img class="media-object"
                                                                       src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png"
                                                                       height="64" width="64"></a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Media heading</h4>
                                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                            ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at,
                                            tempus viverra turpis.</p>
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
                showLoading: true,
                user: {}
            }
        },
        mounted() {
        },
        methods: {
            getUser() {
                this.$http.get('/api/user/').then((response) => {
                    this.showLoading = false;
                    console.info(response.data);
                }, (response) => {
                    console.error(response.bodyText);
                });
            }
        }
    }
</script>
