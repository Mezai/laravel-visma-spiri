<?php

use Mezai\Visma\Controllers\VismaController;

Route::group(['middleware' => config('fortnox.routes.middleware')], function () {
    Route::get(config('visma.routes.oauth.redirect'), [VismaController::class, 'toVisma'])->name('visma.oauth.redirect');
    Route::get(config('visma.routes.oauth.callback'), [VismaController::class, 'handleCallback'])->name('visma.oauth.callback');
});
