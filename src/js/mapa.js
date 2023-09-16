if(document.querySelector('#mapa')) {

    const lat = -17.38781962353542
    const lng = -66.17257206242056
    const zoom = 16

    const map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="mapa__heading">Silicom</h2>
            <p class="mapa__texto">Empresa de Silicom</p>
        `)
        .openPopup();
}