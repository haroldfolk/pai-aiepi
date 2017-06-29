<?php use miloschuman\highcharts\Highcharts;


echo Highcharts::widget([

    'options' => [
        'title' => ['text' => 'Serie de Vacuna Requerida'],
        'xAxis' => [
            'categories' => $fechas
        ],
        'yAxis' => [
            'title' => ['text' => 'Vacunaciones realizadas']
        ],
        'series' => [
            [      'type'=>'column','name' => 'Reales', 'data' => $valoresR],
            [      'type'=>'line','color'=>'#7c7774','name' => 'Pronosticados', 'data' => $valoresP]
        ]
    ]
]);
?>


<!--<div class="container-fluid">-->
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--            <div class="row">-->
<!--                <div class="col-md-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" />-->
<!--                        <div class="caption">-->
<!--                            <h3>-->
<!--                                Thumbnail label-->
<!--                            </h3>-->
<!--                            <p>-->
<!--                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />-->
<!--                        <div class="caption">-->
<!--                            <h3>-->
<!--                                Thumbnail label-->
<!--                            </h3>-->
<!--                            <p>-->
<!--                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />-->
<!--                        <div class="caption">-->
<!--                            <h3>-->
<!--                                Thumbnail label-->
<!--                            </h3>-->
<!--                            <p>-->
<!--                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--                <div class="col-md-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" />-->
<!--                        <div class="caption">-->
<!--                            <h3>-->
<!--                                Thumbnail label-->
<!--                            </h3>-->
<!--                            <p>-->
<!--                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />-->
<!--                        <div class="caption">-->
<!--                            <h3>-->
<!--                                Thumbnail label-->
<!--                            </h3>-->
<!--                            <p>-->
<!--                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4">-->
<!--                    <div class="thumbnail">-->
<!--                        <img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />-->
<!--                        <div class="caption">-->
<!--                            <h3>-->
<!--                                Thumbnail label-->
<!--                            </h3>-->
<!--                            <p>-->
<!--                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.-->
<!--                            </p>-->
<!--                            <p>-->
<!--                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->