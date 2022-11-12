@extends('front/layout')

@section('title', 'Cart')

@section('content')

<div class="container">
  <!-- HERO SECTION-->
  <section class="py-5">
    @component('message', ['sessionName' => 'message'])@endcomponent
    <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
    <div class="row">
      <div class="col-lg-8 mb-4 mb-lg-0">
        <!-- CART TABLE-->
        <div class="table-responsive mb-4">
          <table class="table text-nowrap">
            <thead class="bg-light">
              <tr>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Product</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Price</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Quantity</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">Total</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase"></strong></th>
              </tr>
            </thead>
            <tbody class="border-0">

            @php
                $total = 0;
            @endphp
            
            @if ($cartItems)
              @foreach ($cartItems as $cartItem)
              @php
                  $price = $cartItem->price/100;
                  $total += $price * $cartItem->quantity;
              @endphp
              <tr>
                <th class="ps-0 py-3 border-light" scope="row">
                  <div class="d-flex align-items-center"><a class="reset-anchor d-block animsition-link" href="/product/show?id=<?= $cartItem->id; ?>"><img src="/<?= $cartItem->thumbnail; ?>" alt="..." width="70"></a>
                    <div class="ms-3"><strong class="h6"><a class="reset-anchor animsition-link" href="/product/show?id=<?= $cartItem->id; ?>"><?= $cartItem->name; ?></a></strong></div>
                  </div>
                </th>
                <td class="p-3 align-middle border-light">
                  <p class="mb-0 small">$<?= $price; ?></p>
                </td>
                <td class="p-3 align-middle border-light">
                  <form action="/cart/update" class="d-flex" method="post">
                    <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                      <div class="quantity">
                        <div class="dec-btn p-0"><i class="fas fa-caret-left"></i></div>
                        <input class="form-control form-control-sm border-0 shadow-0 p-0" type="number" name="quantity" value="<?= $cartItem->quantity; ?>">
                        <div class="inc-btn p-0"><i class="fas fa-caret-right"></i></div>
                        <input type="hidden" name="productId" value="<?= $cartItem->id; ?>">
                        <input type="hidden" name="clientIp" value="<?= get_client_ip(); ?>">
                        <input type="hidden" name="destination" value="<?= uri(); ?>"/>
                      </div>
                      
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-2">
                      Update cart
                    </button>
                  </form>
                </td>
                <td class="p-3 align-middle border-light">
                  <p class="mb-0 small">$<?= $price * $cartItem->quantity; ?></p>
                </td>
                <td class="p-3 align-middle border-light">
                  <form class="reset-anchor" action="/cart/delete" method="post">
                    <input type="hidden" name="productId" value="<?= $cartItem->id; ?>">
                    <input type="hidden" name="destination" value="<?= uri(); ?>"/>
                    <button type="submit" class="border-0">
                      <i class="fas fa-trash-alt small text-muted"></i>
                    </button>
                  </form>
                </td>
              </tr>
                  
              @endforeach
                  
            @else
                  <h2 class="text-gray">No item in the cart.</h2>           
            @endif
            </tbody>
          </table>
        </div>
        <!-- CART NAV-->
        <div class="bg-light px-4 py-3">
          <div class="row align-items-center text-center">
            <div class="col-md-6 mb-3 mb-md-0 text-md-start"><a class="btn btn-link p-0 text-dark btn-sm" href="/"><i class="fas fa-long-arrow-alt-left me-2"> </i>Continue shopping</a></div>
            <div class="col-md-6 text-md-end"><a class="btn btn-outline-dark btn-sm" href="/checkout">Procceed to checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></a></div>
          </div>
        </div>
      </div>
      <!-- ORDER TOTAL-->
      <div class="col-lg-4">
        <div class="card border-0 rounded-0 p-lg-4 bg-light">
          <div class="card-body">
            <h5 class="text-uppercase mb-4">Cart total</h5>
            <ul class="list-unstyled mb-0">
              <li class="border-bottom my-2"></li>
              <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong>
                <span>$<?= $total; ?></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES-->
  @component('front/services') @endcomponent
</div>

@endsection