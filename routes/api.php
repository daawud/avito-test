<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->group([], function () use ($router) {
    $router->get('/rooms', 'RoomController@list');
    $router->post('/rooms', 'RoomController@create');
    $router->delete('/rooms/{id}', 'RoomController@delete');
    $router->get('/rooms/{id}/bookings', 'BookingController@list');
    $router->post('/bookings', 'BookingController@create');
    $router->delete('/bookings/{id}', 'BookingController@delete');
});
