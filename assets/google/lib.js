function createGooglePrompt(obj) {
    return new google.maps.places.Autocomplete(obj, {
        language: "ru",
        componentRestrictions: {country: "ru"}
    });
}