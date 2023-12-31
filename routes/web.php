<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['role','auth'],'prefix'=>'admin'], function() {

	#------------------------------- start of HomeController -----------------------------#

	Route::get('/home',[
		'uses'  =>'HomeController@index',
		'as'    =>'home',
		'sort'=> 1,
		'icon'  =>'<i class="nav-icon fas fa-home text-main"></i>',
		'title' =>'الرئيسيه',
		'title_en' =>'home'
	]);


	#------------------------------- end of HomeController -----------------------------#
   # sections
	Route::get('sections',[
		'uses' =>'SectionsController@Index',
		'as'   =>'sections',
		'title'=>'الاقسام',
		'sort'=> 1,
		'subTitle'=>'الاقسام',
		'icon' =>'<i class="fas fa-braille text-main"></i>',
		'subIcon' =>'<i class="fas fa-braille"></i>',
		'q_a'=>true,
		'child'=>[
			'storesections',
			'updatesections',
			'deletesections',
            'Storesec'
		]
	]);

	# store sections
	Route::post('store-sections',[
		'uses'=>'SectionsController@Store',
		'as'  =>'storesections',
		'sort'=> 1,
		'title'=>'إضافة قسم'
	]);

	# update sections
	Route::post('update-sections',[
		'uses'=>'SectionsController@Update',
		'as'  =>'updatesections',
		'sort'=> 1,
		'title'=>'تحديث قسم '
	]);

	# delete sections
	Route::get('delete-sections/{id}',[
		'uses'=>'SectionsController@Delete',
		'as'  =>'deletesections',
		'sort'=> 1,
		'title'=>'حذف قسم '
	]);





	#------------------------------- end of SectionsController -----------------------------#
    # products
	Route::get('products',[
		'uses' =>'ProductsController@Index',
		'as'   =>'products',
		'title'=>'المنتجات',
        'sort'=> 2,
		'subTitle'=>'المنتجات',
		'icon' =>'<i class="fas fa-tags text-main"></i>',
		'subIcon' =>'<i class="fas fa-tags"></i>',
		'q_a'=>true,
		'child'=>[
			'addproducts',
			'storeproducts',
			'editproducts',
			'updateproducts',
			'Shows',
			'DeleteProduct',
            'backets',
            'AddShows',
            'Addbackets',
		]
	]);

	# Shows
	Route::get('shows',[
		'uses' =>'ProductsController@Shows',
		'as'   =>'Shows',
		'title'=>'العروض',
        'sort'=> 2,
		'icon' =>'<i class="fas fa-tags"></i>',
		'q_a'=>true,
		'hasFather'=>true,
	]);

    # backets
	Route::get('backets',[
		'uses' =>'ProductsController@backets',
		'as'   =>'backets',
		'title'=>'البوكسات',
        'sort'=> 2,
		'icon' =>'<i class="fas fa-tags"></i>',
		'q_a'=>true,
		'hasFather'=>true,
	]);

    # add product
	Route::get('add-product',[
		'uses' =>'ProductsController@Addproduct',
		'as'   =>'addproducts',
		'title'=>'إضافة منتج',
        'sort'=> 2,

	]);

     # add show
	Route::get('add-show',[
		'uses' =>'ProductsController@AddShows',
		'as'   =>'AddShows',
		'title'=>'إضافة عرض',
        'sort'=> 2,

	]);

     # add backets
	Route::get('add-backets',[
		'uses' =>'ProductsController@Addbackets',
		'as'   =>'Addbackets',
		'title'=>'إضافة منتج',
        'sort'=> 2,

	]);

	# store product
	Route::post('store-product',[
		'uses' =>'ProductsController@Store',
		'as'   =>'storeproducts',
        'sort'=> 2,
		'title'=>'حفظ منتج',
	]);

	# edit product
	Route::get('edit-product/{id}',[
		'uses' =>'ProductsController@Edit',
		'as'   =>'editproducts',
        'sort'=> 2,
		'title'=>'تعديل منتج',
	]);

	# update product
	Route::post('update-product',[
		'uses' =>'ProductsController@Update',
		'as'   =>'updateproducts',
        'sort'=> 2,
		'title'=>'تحديث منتج',
	]);

	# delete product
	Route::get('delete-product/{id}',[
		'uses'=>'ProductsController@DeleteProduct',
		'as'  =>'DeleteProduct',
        'sort'=> 2,
		'title'=>'حذف  منتج '
	]);
	# providerReports
	Route::get('providerReports',[
		'uses' =>'ProviderReportController@Index',
		'as'   =>'providerReports',
		'title'=>'  تقارير المندوب',
        'sort'=> 6,
        'subTitle'=>'تقارير المندوب',
        'icon' =>'<i class="fas fa-tags text-main"></i>',
		'subIcon' =>'<i class="fas fa-tags"></i>',
		'q_a'=>true,
		'child'=>[
			'deleteProviderReport',
			'addProviderReport',
			'storeProviderReport',
			'showProviderReport',
		]
	]);

    # add Provider Report
	Route::get('create_report',[
		'uses' =>'ProviderReportController@Create',
		'as'   =>'addProviderReport',
		'title'=>'إضافة تقرير المندوب',
        'sort'=> 6,

	]);


     # show Provider Report
	Route::get('show-report/{id}',[
		'uses' =>'ProviderReportController@Show',
		'as'   =>'showProviderReport',
		'title'=>' عرض تقرير المندوب',
        'sort'=> 6,

	]);

	# store Provider Report
	Route::post('store-report',[
		'uses' =>'ProviderReportController@Store',
		'as'   =>'storeProviderReport',
        'sort'=> 6,
		'title'=>'حفظ تقرير المندوب',
	]);

	# delete Provider Report
	Route::get('delete-report/{id}',[
		'uses'=>'ProviderReportController@DeleteProviderReport',
		'as'  =>'deleteProviderReport',
        'sort'=> 6,
		'title'=>'حذف  تقرير المندوب '
	]);

    # orders
	Route::get('orders',[
		'uses' =>'ordersController@orders',
		'as'   =>'orders',
		'title'=>'الطلبات',
		'subTitle'=>'الطلبات',
		'sort'=> 5,
		'icon' =>'<i class="fas fa-cart-arrow-down  text-main"></i>',
		'subIcon' =>'<i class="fas fa-cart-arrow-down"></i>',
		'q_a'=>true,
		'child'=>[

			'editorders',
			'Deleteorder',


		]
	]);



	# edit orders
	Route::get('edit-order/{id}',[
		'uses' =>'ordersController@Edit',
		'sort'=> 5,
		'as'   =>'editorders',
		'title'=>'تعديل طلب',
	]);

	# delete orders
	Route::get('delete-order/{id}',[
		'uses'=>'ordersController@Deleteorder',
		'sort'=> 5,
		'as'  =>'Deleteorder',
		'title'=>'حذف طلب'
	]);

		#------------------------------- start of CustomersController -----------------------------#


	# customers
	Route::get('customers',[
		'uses'=>'CustomersController@Index',
		'as'  =>'customers',
        'sort'=> 2,
		'icon' =>'<i class="fas fa-user text-main"></i>',
		'subIcon' =>'<i class="fas fa-user"></i>',
		'title'=>'العملاء',
		'subTitle'=>'العملاء',
		'q_a'=>true,
		'child'=>[
			'deletecustomers',
			'storecustomers',
		]
	]);



	# update customers
	Route::post('update-customers',[
		'uses'=>'CustomersController@store',
        'sort'=> 2,
		'as'  =>'storecustomers',
		'title'=>'تحديث عميل'
	]);

	# delete customers
	Route::get('delete-customers/{id}',[
		'uses'=>'CustomersController@Delete',
        'sort'=> 2,
		'as'  =>'deletecustomers',
		'title'=>'حذف عميل'
	]);

	#------------------------------- end of CustomersController -----------------------------#
    # Providers
    Route::get('Providers',[
        'uses'=>'providersController@Index',
        'as'  =>'Providers',
        'sort'=> 2,
        'icon' =>'<i class="fas fa-user-cog text-main"></i>',
        'subIcon' =>'<i class="fas fa-user-cog"></i>',
        'title'=>'المناديب',
        'subTitle'=>'المناديب',
        'q_a'=>true,
        'child'=>[
            'updateProviders',
            'deleteProviders',
            'storeProviders',
        ]
    ]);

    # store Providers
    Route::post('store-Providers',[
        'uses'=>'providersController@store',
        'sort'=> 2,
        'as'  =>'storeProviders',
        'title'=>'حفظ مندوب'
    ]);
    # update Providers
    Route::post('update-Providers',[
        'uses'=>'providersController@Update',
        'sort'=> 2,
        'as'  =>'updateProviders',
        'title'=>'تحديث مندوب'
    ]);

    # delete Providers
    Route::get('delete-Providers/{id}',[
        'uses'=>'providersController@Delete',
        'sort'=> 2,
        'as'  =>'deleteProviders',
        'title'=>'حذف مندوب'
    ]);

	#------------------------------- start of SupervisorsController -----------------------------#

	# users
	Route::get('supervisors',[
		'uses' =>'SupervisorsController@Index',
		'as'   =>'supervisors',
		'sort'=> 4,
		'title'=>'المشرفين',
		'subTitle'=>'المشرفين',
		'title_en' =>'supervisors',
		'subTitle_en' =>'supervisors',
		'icon' =>'<i class="fas fa-user-secret text-main"></i>',
		'subIcon' =>'<i class="fas fa-user-secret"></i>',
		'child'=>[
			'supervisorspage',
			'storesupervisor',
			'deletesupervisor',
			'edittsupervisors',
			'updatesupervisor',
		]
	]);

	# add user
	Route::get('add-supervisor-page',[
		'uses'=>'SupervisorsController@AddSupervisorPage',
		'as'  =>'supervisorspage',
		'sort'=> 4,
		'icon' =>'<i class="fas fa-plus"></i>',
		'title'=>'إضافة مشرف',
		'title_en' =>'add supervisor',
		'hasFather'=>true,
		'q_a'=>true
	]);

	# store user
	Route::post('store-supervisor',[
		'uses'=>'SupervisorsController@StoreSupervisor',
		'as'  =>'storesupervisor',
		'title_en' =>'store supervisor',
		'sort'=> 4,
		'title'=>'حفظ المشرف'
	]);

	# edit user
	Route::get('edit-supervisor/{id}',[
		'uses'=>'SupervisorsController@EditSupervisor',
		'as'  =>'edittsupervisors',
		'sort'=> 4,
		'title_en' =>'edit supervisor',
		'title'=>'تعديل مشرف'
	]);

	# update user
	Route::post('update-supervisor',[
		'uses'=>'SupervisorsController@UpdateSupervisor',
		'as'  =>'updatesupervisor',
		'title_en' =>'update supervisor',
		'sort'=> 4,
		'title'=>'تحديث مشرف'
	]);

	# delete user
	Route::get('delete-supervisor/{id}',[
		'uses'=>'SupervisorsController@DeleteSupervisor',
		'as'  =>'deletesupervisor',
		'title_en' =>'delete supervisor',
		'sort'=> 4,
		'title'=>'حذف مشرف'
	]);

	#------------------------------- end of SupervisorsController -----------------------------#


	#------------------------------- start of SlidersController -----------------------------#

	// # sliders
	// Route::get('sliders',[
	// 	'uses' =>'SlidersController@Index',
	// 	'as'   =>'sliders',
	// 	'title'=>'الإسلايدر',
	// 	'subTitle'=>'الإسلايدر',
	// 	'title_en' =>'sliders',
	// 	'subTitle_en' =>'sliders',
	// 	'sort'=> 1,
	// 	'icon' =>'<i class="fas fa-images text-main"></i>',
	// 	'subIcon' =>'<i class="fas fa-images"></i>',
	// 	'child'=>[
	// 		'storeslider',
	// 		'updateslider',
	// 		'deleteslider',
	// 	]
	// ]);

	// # store slider
	// Route::post('store-slider',[
	// 	'uses'=>'SlidersController@Store',
	// 	'as'  =>'storeslider',
	// 	'title_en' =>'store slider',
	// 	'sort'=> 1,
	// 	'title'=>'إضافة صورة سلايدر'
	// ]);

	// # update services
	// Route::post('update-slider',[
	// 	'uses'=>'SlidersController@Update',
	// 	'as'  =>'updateslider',
	// 	'title_en' =>'update slider',
	// 	'sort'=> 1,
	// 	'title'=>'تحديث صورة إسلايدر'
	// ]);

	// # delete slider
	// Route::get('delete-slider/{id}',[
	// 	'uses'=>'SlidersController@Delete',
	// 	'as'  =>'deleteslider',
	// 	'title_en' =>'delete slider',
	// 	'sort'=> 1,
	// 	'title'=>'حذف صورة إسلايدر'
	// ]);

	// // #------------------------------- end of SlidersController -----------------------------#


	// // #------------------------------- start of PartnersController -----------------------------#

	// # partners
	// Route::get('partners',[
	// 	'uses' =>'PartnersController@Index',
	// 	'as'   =>'partners',
	// 	'title'=>'الشركاء',
	// 	'subTitle'=>'الشركاء',
	// 	'title_en' =>'partners',
	// 	'subTitle_en' =>'partners',
	// 	'sort'=> 1,
	// 	'icon' =>'<i class="fas fa-handshake text-main"></i>',
	// 	'subIcon' =>'<i class="fas fa-handshake"></i>',
	// 	'child'=>[
	// 		'storepartner',
	// 		'updatepartner',
	// 		'deletepartner',
	// 	]
	// ]);

	// # store partner
	// Route::post('store-partner',[
	// 	'uses'=>'PartnersController@Store',
	// 	'as'  =>'storepartner',
	// 	'sort'=> 1,
	// 	'title_en' =>'store partner',
	// 	'title'=>'إضافة شريك'
	// ]);

	// # update partner
	// Route::post('update-partner',[
	// 	'uses'=>'PartnersController@Update',
	// 	'as'  =>'updatepartner',
	// 	'title_en' =>'update partner',
	// 	'sort'=> 1,
	// 	'title'=>'تحديث شريك'
	// ]);

	// # delete partner
	// Route::get('delete-partner/{id}',[
	// 	'uses'=>'PartnersController@Delete',
	// 	'as'  =>'deletepartner',
	// 	'title_en' =>'delete partner',
	// 	'sort'=> 1,
	// 	'title'=>'حذف شريك'
	// ]);

	// // #------------------------------- end of PartnersController -----------------------------#


	// // #------------------------------- start of PolicyController -----------------------------#


	// # customer policy
	// Route::get('customer-policy',[
	// 	'uses' =>'PolicyController@CustomerPolicy',
	// 	'as'   =>'customerpolicy',
	// 	'sort'=> 10,
	// 	'title'=>'الشروط والأحكام',
	// 	'subTitle'=>' المستخدمين',
	// 	'title_en' =>'customer policy',
	// 	'subTitle_en' =>'customer policy',
	// 	'icon' =>'<i class="fas fa-balance-scale text-main"></i>',
	// 	'subIcon' =>'<i class="fas fa-address-book"></i>',
	// 	'child'=>[
	// 		'updatecustomerpolicy',
	// 		'providerpolicy',
	// 		'updateproviderpolicy',
	// 	]
	// ]);

	// # update customer policy
	// Route::post('update-customer-policy',[
	// 	'uses' =>'PolicyController@UpdateCustomerPolicy',
	// 	'as'   =>'updatecustomerpolicy',
	// 	'sort'=> 10,
	// 	'title_en' =>'update customer policy',
	// 	'title'=>'تحديث المستخدمين',
	// ]);

	// # provider policy
	// Route::get('provider-policy',[
	// 	'uses' =>'PolicyController@ProviderPolicy',
	// 	'as'   =>'providerpolicy',
	// 	'title'=>' المسوقيين',
	// 	'sort'=> 10,
	// 	'title_en' =>'provider policy',
	// 	'icon' =>'<i class="fas fa-user-edit"></i>',
	// 	'hasFather'=>true
	// ]);

	// # update provider policy
	// Route::post('update-provider-policy',[
	// 	'uses' =>'PolicyController@UpdateProviderPolicy',
	// 	'as'   =>'updateproviderpolicy',
	// 	'title_en' =>'update provider policy',
	// 	'sort'=> 10,
	// 	'title'=>'  تحديث المسوقيين',
	// ]);

	// #------------------------------- end of PolicyController -----------------------------#


	// #------------------------------- start of QuestionController -----------------------------#

	// # common questions
	// Route::get('common-questions',[
	// 	'uses' =>'QuestionController@Index',
	// 	'as'   =>'commonquestions',
	// 	'title'=>'الأسئلة الشائعة',
	// 	'subTitle'=>'الأسئلة الشائعة',
	// 	'title_en' =>'common questions',
	// 	'subTitle_en' =>'common questions',
	// 	'sort'=> 1,
	// 	'icon' =>'<i class="fas fa-question-circle text-main"></i>',
	// 	'subIcon' =>'<i class="fas fa-question-circle"></i>',
	// 	'child'=>[
	// 		'storequestions',
	// 		'updatequestions',
	// 		'deletequestions',
	// 	]
	// ]);

	// # store questions
	// Route::post('store-questions',[
	// 	'uses' =>'QuestionController@Store',
	// 	'as'   =>'storequestions',
	// 	'title_en' =>'store questions',
	// 	'sort'=> 1,
	// 	'title'=>'حفظ سؤال',
	// ]);

	// # update questions
	// Route::post('update-questions',[
	// 	'uses' =>'QuestionController@Update',
	// 	'as'   =>'updatequestions',
	// 	'title_en' =>'update questions',
	// 	'sort'=> 1,
	// 	'title'=>'تحديث سؤال',
	// ]);

	// # delete questions
	// Route::get('delete-questions/{id}',[
	// 	'uses' =>'QuestionController@Delete',
	// 	'as'   =>'deletequestions',
	// 	'title_en' =>'delete questions',
	// 	'sort'=> 1,
	// 	'title'=>'حذف سؤال',
	// ]);

	// #------------------------------- end of QuestionController -----------------------------#


	#------------------------------- start of PermissionsController -----------------------------#

	# permissions
	Route::get('permissions',[
		'uses' =>'PermissionsController@Index',
		'as'   =>'permissions',
		'title'=>'الصلاحيات',
		'title_en' =>'permissions',
		'subTitle_en' =>'permissions',
		'sort'=> 9,
		'subTitle'=>'الصلاحيات',
		'icon' =>'<i class="fas fa-biohazard text-main"></i>',
		'subIcon' =>'<i class="fas fa-biohazard"></i>',
		'child'=>[
			'addrolepage',
			'addpermission',
			'editpermission',
			'editrolepage',
			'updatepermission',
			'deletepermission',
		]
	]);

	# add role page
	Route::get('add-role-page',[
		'uses'=>'PermissionsController@AddRolePage',
		'as'  =>'addrolepage',
		'sort'=> 9,
		'title_en' =>'add role',
		'icon' =>'<i class="fas fa-plus"></i>',
		'title'=>'إضافة صلاحيه',
		'hasFather'=>true
	]);

	# add role (ajax)
	Route::post('add-permission',[
		'uses'=>'PermissionsController@Add',
		'as'  =>'addpermission',
		'title_en' =>'add permission',
		'sort'=> 9,
		'title'=>'حفظ صلاحيه'
	]);

	# edit permission
	Route::get('edit-permission/{id}',[
		'uses'  =>'PermissionsController@EditRole',
		'as'    =>'editrolepage',
		'title_en' =>'edit permission',
		'sort'=> 9,
		'title' =>'تعديل صلاحيه'
	]);

	# update role (ajax)
	Route::post('update-permission',[
		'uses'=>'PermissionsController@Update',
		'as'  =>'updatepermission',
		'title_en' =>'update permission',
		'sort'=> 9,
		'title'=>'تحديث صلاحيه'
	]);

	# delete role
	Route::post('delete-permission',[
		'uses'=>'PermissionsController@Delete',
		'as'  =>'deletepermission',
		'title_en' =>'delete permission',
		'sort'=> 9,
		'title'=>'حذف صلاحيه'
	]);

	#------------------------------- end of PermissionsController -----------------------------#

	#------------------------------- start of ReportsController -----------------------------#
	# supervisor reports
	Route::get('supervisors-reports',[
		'uses'  =>'ReportsController@Index',
		'as'    =>'supervisorsresports',
		'sort'=> 8,
		'icon'  =>'<i class="fas fa-clipboard text-main"></i>',
		'subIcon'  =>'<i class="fas fa-clipboard"></i>',
		'title' =>'التقارير',
		'title_en' =>'supervisors reports',
		'subTitle_en' =>'supervisors reports',
		'subTitle' =>'تقارير المشرفين',
		'child' =>[
			'deletereport',
			'deleteallreports',
			'reports'
		]
	]);

	# reports
	Route::get('reports/{id?}',[
		'uses'=>'ReportsController@Reports',
		'as'  =>'reports',
		'title_en' =>' reports',
		'sort'=> 8,
		'title'=>'قائمة التقارير'
	]);


	# delete all reports
	Route::post('delete-all-reports',[
		'uses'=>'ReportsController@DeleteAllReports',
		'as'  =>'deleteallreports',
		'title_en' =>' delete-all-reports',
		'sort'=> 8,
		'title'=>'حذف جميع التقارير'
	]);

	# delete report
	Route::post('delete-report',[
		'uses'=>'ReportsController@DeleteReport',
		'as'  =>'deletereport',
		'title_en' =>' delete-report',
		'sort'=> 8,
		'title'=>'حذف تقرير'
	]);

	#------------------------------- end of ReportsController -----------------------------#


	#------------------------------- start of PagesController -----------------------------#

	// # pages
	// Route::get('pages',[
	// 	'uses' =>'PagesController@Index',
	// 	'as'   =>'pages',
	// 	'title'=>'الصفحات',
	// 	'subTitle'=>'الصفحات',
	// 	'title_en' =>'pages',
	// 	'subTitle_en' =>'pages',
	// 	'icon' =>'<i class="fas fa-pager text-main"></i>',
	// 	'subIcon' =>'<i class="fas fa-pager"></i>',
	// 	'child'=>[
	// 		'storepage',
	// 		'updatepage',
	// 		'deletepage',
	// 	]
	// ]);



	// # store page
	// Route::post('store-page',[
	// 	'uses' =>'PagesController@Store',
	// 	'as'   =>'storepage',
	// 	'title_en' =>'store pages',
	// 	'title'=>'حفظ صفحة',
	// ]);

	// # update page
	// Route::post('update-page',[
	// 	'uses' =>'PagesController@Update',
	// 	'as'   =>'updatepage',
	// 	'title_en' =>'update pages',
	// 	'title'=>'تحديث صفحة',
	// ]);

	// # delete page
	// Route::get('delete-page/{id}',[
	// 	'uses' =>'PagesController@delete',
	// 	'as'   =>'deletepage',
	// 	'title_en' =>'delete pages',
	// 	'title'=>'حذف صفحة',
	// ]);


	#------------------------------- end of PagesController -----------------------------#


	#------------------------------- start of inboxController -----------------------------#

	# inbox
	Route::get('inbox',[
		'uses'    =>'inboxController@Index',
		'as'      =>'inbox',
		'sort'=> 11,
		'title_en' =>'inbox',
		'title'   =>'الرسائل',
		'icon'    =>' <i class="fas fa-envelope text-main"></i> ',
		'child'   =>[
			'viewmessage',
			'deletemessage',
		]
	]);

	# view message
	Route::get('view-message/{id}',[
		'uses'=>'inboxController@View',
		'title_en' =>'view message',
		'as'  =>'viewmessage',
		'sort'=> 11,
		'title'=>'عرض رسالة'
	]);

	# delete message
	Route::post('delete-message',[
		'uses'=>'inboxController@Delete',
		'as'  =>'deletemessage',
		'title_en' =>'delete message',
		'sort'=> 11,
		'title'=>'حذف رسالة'
	]);

	#------------------------------- end of inboxController -----------------------------#


	#------------------------------- start of AdminNotificationsController -----------------------------#

	# notifications
	Route::get('notifications',[
		'uses'    =>'AdminNotificationsController@Index',
		'as'      =>'notifications',
		'title'   =>'الإشعارات',
		'title_en' =>'notifications',
		'sort'=> 12,
		'icon'    =>'<i class="fas fa-bell text-main"></i> ',
		'child'   =>[
			'notifications.delete_all',
		]
	]);

	# delete all
	Route::get('delete-all-notifications',[
		'uses'=>'AdminNotificationsController@DeleteAll',
		'as'  =>'notifications.delete_all',
		'title_en' =>'delete all notifications',
		'sort'=> 12,
		'title'=>'حذف كل الإشعارات'
	]);


	#------------------------------- end of AdminNotificationsController -----------------------------#
	#------------------------------- start of SettingController -----------------------------#

	# setting
	Route::get('setting',[
		'uses' =>'SettingController@Index',
		'as'   =>'setting',
		'title_en' =>'setting',
		'title'=>'الإعدادات',
		'sort'=> 13,
		'icon' =>'<i class="fas fa-cog text-main"></i>',
		'child'=>[
			'updatemainsetting',
			'updatecopyrigth',
			'updateaboutapp',
			'updatepolicy',
			'updatesmtp',
			'updatesms',
			'updateonesignal',
			'updatefcm',
			'storedynamicsetting',
			'updatedynamicsetting',
			'deletedynamicsetting',
			'Storesocial',
			'socialUpdate',
			'Deletesocial',
			'updatewhyus',
		]
	]);

	# update main setting
	Route::post('update-main-setting',[
		'uses'=>'SettingController@UpdateMainSetting',
		'as'  =>'updatemainsetting',
		'title_en' =>'update main setting',
		'sort'=> 13,
		'title'=>'تحديث الإعدادات العامه'
	]);

	# update copyrigth
	Route::post('update-copyrigth',[
		'uses'=>'SettingController@UpdateMainCopyrigth',
		'as'  =>'updatecopyrigth',
		'title_en' =>'update copyrigth',
		'sort'=> 13,
		'title'=>'تحديث الحقوق'
	]);

	# update about app
	Route::post('update-about-app',[
		'uses'=>'SettingController@UpdateMainAboutApp',
		'as'  =>'updateaboutapp',
		'title_en' =>'update about app',
		'sort'=> 13,
		'title'=>'تحديث عن التطبيق'
	]);

	# update why us
	Route::post('update-why-us',[
		'uses'=>'SettingController@UpdateWhyUs',
		'as'  =>'updatewhyus',
		'title_en' =>'update why us',
		'sort'=> 13,
		'title'=>'تحديث لماذا سلسلة'
	]);

	# update app policy
	Route::post('update-policy',[
		'uses'=>'SettingController@UpdatePolicy',
		'title_en' =>'update policy',
		'as'  =>'updatepolicy',
		'sort'=> 13,
		'title'=>' تحديث الشروط والأحكام'
	]);

	# update smtp
	Route::post('update-smtp',[
		'uses'=>'SettingController@UpdateSMTP',
		'as'  =>'updatesmtp',
		'title_en' =>'update smtp',
		'sort'=> 13,
		'title'=>'تحديث ال SMTP'
	]);

	# update sms
	Route::post('update-sms',[
		'uses'=>'SettingController@UpdateSmS',
		'as'  =>'updatesms',
		'title_en' =>'update sms',
		'sort'=> 13,
		'title'=>'تحديث ال sms'
	]);

	# update onesignal
	Route::post('update-onesignal',[
		'uses'=>'SettingController@UpdateOneSignal',
		'as'  =>'updateonesignal',
		'title_en' =>'update onesignal',
		'sort'=> 13,
		'title'=>'تحديث ال onesignal'
	]);

	# update fcm
	Route::post('update-fcm',[
		'uses'=>'SettingController@UpdateFCM',
		'as'  =>'updatefcm',
		'title_en' =>'update fcm',
		'sort'=> 13,
		'title'=>'تحديث ال fcm'
	]);

	# store dynamic setting
	Route::post('store-dynamic-setting',[
		'uses'=>'SettingController@StoreDynamicSetting',
		'as'  =>'storedynamicsetting',
		'sort'=> 13,
		'title_en' =>'store dynamic setting',
		'title'=>'إضافة إعدادات إضافية'
	]);

	# update dynamic setting
	Route::post('update-dynamic-setting',[
		'uses'=>'SettingController@UpdateDynamicSetting',
		'as'  =>'updatedynamicsetting',
		'title_en' =>'update dynamic',
		'sort'=> 13,
		'title'=>'تحديث إعدادات إضافية'
	]);

	# delete dynamic setting
	Route::post('delete-dynamic-setting',[
		'uses'=>'SettingController@DeleteDynamicSetting',
		'as'  =>'deletedynamicsetting',
		'title_en' =>'delete dynamic',
		'sort'=> 13,
		'title'=>'حذف إعدادات إضافية'
	]);

	# store social
	Route::post('store-socials',[
		'uses'=>'SettingController@Storesocial',
		'as'  =>'Storesocial',
		'title_en' =>'store socials',
		'sort'=> 13,
		'title'=>'إضافة موقع'
	]);

	# update social
	Route::post('update-socials-media',[
		'uses'=>'SettingController@socialUpdate',
		'as'  =>'socialUpdate',
		'title_en' =>'update media',
		'sort'=> 13,
		'title'=>'تحديث موقع'
	]);

	# delete social
	Route::post('delete-socials',[
		'uses'=>'SettingController@Deletesocial',
		'as'  =>'Deletesocial',
		'title_en' =>'delete media',
		'sort'=> 13,
		'title'=>'حذف موقع'
	]);

	#------------------------------- end of SettingController -----------------------------#

});



Route::get('dd',function(){
	Artisan::queue('view:clear');
	return 'done';


});
// Auth::routes();
Route::get('lang/change', 'SettingController@change')->name('changeLang');
Route::post('color/change', 'HomeController@color')->name('color_change');

Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');


