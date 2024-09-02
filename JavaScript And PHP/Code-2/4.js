fetch('http://localhost:3000/orders')
    .then(response => response.json())
    .then(data => {
        const ordersDiv = document.getElementById('orders');
        data.forEach(order => {
            const p = document.createElement('p');
            p.textContent = `Food: ${order.food}, Quantity: ${order.quantity}`;
            ordersDiv.appendChild(p);
        });
    });
