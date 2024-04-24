<div class="col-lg-5">

<div class="card bg-primary text-white rounded-3">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 style="color:white;" class="mb-0">Card Details</h5>
      <div style="background-color:white;border-radius:10px;" class="">
      <img src="{{asset('storage/images/'.$user_image)}}"
        class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
      </div>
    </div>

    <p style="color:white;" class="small mb-2">Card type</p>
    <a href="#!" type="submit" class="text-white"><i
        class="fab fa-cc-mastercard fa-2x me-2"></i></a>
    <a href="#!" type="submit" class="text-white"><i
        class="fab fa-cc-visa fa-2x me-2"></i></a>
    <a href="#!" type="submit" class="text-white"><i
        class="fab fa-cc-amex fa-2x me-2"></i></a>
    <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

    <form class="mt-4">
      <div data-mdb-input-init class="form-outline form-white mb-4">
        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
          placeholder="Name" />
        <label class="form-label" for="typeName">Cardholder's Name</label>
      </div>

      <div data-mdb-input-init class="form-outline form-white mb-4">
        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
          placeholder="XXX XXX XXX" minlength="19" maxlength="19" />
        <label class="form-label" for="typeText">Card Number</label>
      </div>

      <div class="row mb-4">
        <div class="col-md-6">
          <div data-mdb-input-init class="form-outline form-white">
            <input type="text" id="typeExp" class="form-control form-control-lg"
              placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
            <label class="form-label" for="typeExp">Expiration</label>
          </div>
        </div>
        <div class="col-md-6">
          <div data-mdb-input-init class="form-outline form-white">
            <input type="password" id="typeText" class="form-control form-control-lg"
              placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
            <label class="form-label" for="typeText">Cvv</label>
          </div>
        </div>
      </div>

    </form>

    <hr class="my-4">

    <div class="d-flex justify-content-between">
      <p style="color:white;" class="mb-2">Subtotal</p>
      <p style="color:white;" class="mb-2">${{$totalPrice}}</p>
    </div>

    <div class="d-flex justify-content-between">
      <p style="color:white;" class="mb-2">Shipping</p>
      <p style="color:white;" class="mb-2">$20.00</p>
    </div>

    <div class="d-flex justify-content-between mb-4">
      <p style="color:white;" class="mb-2">Total(Incl. taxes)</p>
      <p style="color:white;" class="mb-2">$4818.00</p>
    </div>

    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-block btn-lg">
      <div class="d-flex justify-content-between">
        <span style="color:white;">${{$totalPrice}}</span>
        <span style="margin-left:10px;color:white;"> Total<i class="fas fa-long-arrow-alt-right ms-2"></i></span>
      </div>
    </button>

  </div>
</div>

</div>

</div>