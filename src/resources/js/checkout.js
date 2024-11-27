const stripe = Stripe("");

// Optional: If you're doing custom animations, hide the Element
const expressCheckoutDiv = document.getElementById("express-checkout-element");
expressCheckoutDiv.style.visibility = "hidden";

let secret = expressCheckoutDiv.getAttribute("data-secret");

const options = {
  mode: "payment",
  amount: 1500,
  currency: "gbp",
  appearance: {
    /*...*/
  },
};

// Set up Stripe.js and Elements to use in checkout form.
const elements = stripe.elements(options);

// Create and mount the Express Checkout Element
const expressCheckoutElement = elements.create("expressCheckout");
expressCheckoutElement.mount("#express-checkout-element");

expressCheckoutElement.on("ready", ({ availablePaymentMethods }) => {
  if (!availablePaymentMethods) {
    // No buttons will show
  } else {
    // Optional: Animate in the Element
    expressCheckoutDiv.style.visibility = "initial";
  }
});

expressCheckoutElement.on("click", (event) => {
  const options = {
    emailRequired: true,
    phoneNumberRequired: true,
    shippingAddressRequired: true,
    allowedShippingCountries: ["GB"],
    shippingRates: [
      {
        id: "standard-shipping",
        displayName: "Standard shipping",
        amount: 300,
        deliveryEstimate: {
          maximum: { unit: "day", value: 7 },
          minimum: { unit: "day", value: 5 },
        },
      },
      {
        id: "collection",
        displayName: "Collection",
        amount: 0,
      },
    ],
  };
  event.resolve(options);
});

const handleError = (error) => {
  const messageContainer = document.querySelector("#error-message");
  messageContainer.textContent = error.message;
};

expressCheckoutElement.on("confirm", async (event) => {
  const { error: submitError } = await elements.submit();
  if (submitError) {
    handleError(submitError);
    return;
  }

  // Create the PaymentIntent and obtain clientSecret
  const res = await fetch("./create-intent.php", {
    method: "POST",
  });
  const { client_secret: clientSecret } = await res.json();

  const { error } = await stripe.confirmPayment({
    // `elements` instance used to create the Express Checkout Element
    elements,
    // `clientSecret` from the created PaymentIntent
    clientSecret,
    confirmParams: {
      return_url: "https://www.oliviazuo.co.uk/index.php",
    },
  });

  if (error) {
    // This point is only reached if there's an immediate error when
    // confirming the payment. Show the error to your customer (for example, payment details incomplete)
    handleError(error);
  } else {
    // The payment UI automatically closes with a success animation.
    // Your customer is redirected to your `return_url`.
  }
});
