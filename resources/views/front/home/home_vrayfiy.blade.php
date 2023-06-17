<div class="main-colored">
      <div class="colored-bg"></div>
      <div class="bread-crumb"></div>
      <div class="register-form">
        <div class="container">
          <div class="row">
          <form action="{{ route('update_profile_complate') }}" class="valid" enctype='multipart/form-data' method="post">
            {{csrf_field()}}
              <legend>بيانات التسجيل</legend>
              <p>سنقوم بطرح بعض الأسئلة التي يتوجب عليك الاجابة عليها جميعاً</p>
              <div class="form_item d-flex">
                <div class="form-group">
                  <label>الاسم كاملاً</label>
                  <input
                    type="text"
                    name="name"
                    required
                    class="form-control"
                    placeholder="أدخل الاسم كاملاً..."
                  />
                </div>
                <div class="form-group">
                  <label>البريد الالكتروني</label>
                  <input
                    type="email"
                    name="email"
                    required
                    class="form-control"
                    placeholder="أدخل البريد الالكتروني..."
                  />
                </div>
                <div class="form-group">
                  <label>رقم التواصل</label>
                  <input
                    type="number"
                    name="phone"
                    required
                    class="form-control"
                    placeholder="أدخل رقم التواصل..."
                  />
                </div>
                <div class="form-group">
                  <label>الدرجة العلمية</label>
                  <input
                    type="text"
                    name="degree"
                    required
                    class="form-control"
                    placeholder="أدخل الدرجة العلمية..."
                  />
                </div>
                <div class="form-group">
                  <label>التخصص</label>
                  <input
                    type="text"
                    name="spaci"
                    required
                    class="form-control"
                    placeholder="أدخل التخصص..."
                  />
                </div>
                <div class="form-group">
                  <label>مكان العمل</label>
                  <input
                    type="text"
                    required
                    name="place_work"
                    class="form-control"
                    placeholder="أدخل مكان العمل..."
                  />
                </div>
                <div class="form-group">
                  <label>المسمى الوظيفي</label>
                  <input
                    type="text"
                    required
                    name="job_name"
                    class="form-control"
                    placeholder="أدخل المسمى الوظيفي..."
                  />
                </div>
                <div class="form-group">
                  <label>المنطقة </label>
                  <input
                    type="text"
                    required
                    name="area"
                    class="form-control"
                    placeholder="أدخل المنطقة..."
                  />
                </div>
                <div class="form-group">
                  <label>المدينة</label>
                  <input
                    type="text"
                    required
                    name="city"
                    class="form-control"
                    placeholder="أدخل المدينة..."
                  />
                </div>
                <div class="form-group">
                  <label> الشهادات والدورات</label>
                  <input
                    type="file"
                    name="file"
                    required
                    class="form-control"
                    placeholder="أضف الشهادات والدورات"
                  />
                </div>
                <button type="submit" class="btn mt-5 w-50 m-auto">حفظ</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
