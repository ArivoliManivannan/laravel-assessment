<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buy Product</title>
</head>
<body>
    <h1>{{ $product->name }}</h1>
    <p>Price: ${{ $product->price }}</p>
    <p>{{ $product->description }}</p>

    <form action="{{ route('products.charge', $product->id) }}" method="POST" id="payment-form">
        @csrf
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <button type="submit" id="submit">Pay ${{ $product->price }}</button>
        <div id="card-errors" role="alert"></div>
    </form>
<!-- 
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe("{{ config('services.stripe.access_key') }}");
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const {token, error} = await stripe.createToken(card);

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
            } else {
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    </script> -->
</body>
</html>
