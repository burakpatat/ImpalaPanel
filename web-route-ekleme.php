    //ESTATE_FEATURE
    Route::post('/estatefeatures/delete',[\App\Http\Controllers\Back\EstateFeatureController::class,'delete'])->name("estatefeatures.delete");

    Route::get('/estatefeatures/updateInfo',[\App\Http\Controllers\Back\EstateFeatureController::class,'updateInfo'])->name('estatefeatures.updateInfo');

    Route::post('/estatefeatures/updateData',[\App\Http\Controllers\Back\EstateFeatureController::class,'updateData'])->name("estatefeatures.updateData");

    Route::resource('estatefeatures','App\Http\Controllers\Back\EstateFeatureController');

   /* Route::get('/estatefeatures', [EstateFeatureController::class, 'index'])->name('admin.estatefeature.index');

    Route::get('/estatefeatures/switch', [EstateFeatureController::class, 'SwitchStatus'])->name('admin.estatefeature.switch');

    Route::post('/estatefeatures/create', [EstateFeatureController::class, 'create'])->name('admin.estatefeature.create');

    Route::get('/estatefeatures/updatedata', [EstateFeatureController::class, 'updatedata'])->name('admin.estatefeature.updatedata');

    Route::post('/estatefeatures/update', [EstateFeatureController::class, 'update'])->name('admin.estatefeature.update');*/