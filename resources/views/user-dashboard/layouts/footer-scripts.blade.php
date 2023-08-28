<script src="{{ asset('user/assets/cdn/jquery2.js') }}"></script>
<script src="{{ asset('user/assets/cdn/jquery3.js') }}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('user/assets/cdn/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('user/assets/main.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
</script>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCab5ahH6KkodUavDwBCigXTL7ZbrkzS94&callback=initAutocomplete&libraries=places&v=weekly"
async></script>
<script>
    let autocomplete;
    let address1Field;
    let postalField;

    function initAutocomplete() {
        address1Field = document.querySelector("#ship-address");
        postalField = document.querySelector("#postcode");
        // addresses in the US and Canada.
        autocomplete = new google.maps.places.Autocomplete(address1Field, {
            componentRestrictions: {
                country: ["us"]
            },
            fields: ["address_components", "geometry"],
            types: ["address"],
        });
        address1Field.focus();
        autocomplete.addListener("place_changed", fillInAddress);
    }

    function fillInAddress() {
        const place = autocomplete.getPlace();
        let address1 = "";
        let postcode = "";
        document.getElementById('latitude_input').value = place.geometry.location.lat();
        document.getElementById('longitude_input').value = place.geometry.location.lng();
        for (const component of place.address_components) {
            const componentType = component.types[0];
            // console
            switch (componentType) {
                case "street_number": {
                    address1 = `${component.long_name} ${address1}`;
                    break;
                }

                case "route": {
                    address1 += component.short_name;
                    break;
                }

                case "postal_code": {
                    postcode = `${component.long_name}${postcode}`;
                    break;
                }
                case "locality":
                    document.querySelector("#locality").value = component.long_name;
                    break;
                case "administrative_area_level_1": {
                    document.querySelector("#state").value = component.short_name;
                    break;
                }
            }
        }

        address1Field.value = address1;
        postalField.value = postcode;
    }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });

		$(function(){
			$(document).on('click','#delete',function(e){
				 e.preventDefault();
				 var link = $(this).attr("href");
				Swal.fire({
				title: 'Are you sure?',
				text: "To Delete this Data?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = link
					Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
					)
				}
				});
			});
		});
</script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break;
    }
    @endif
    </script>
<script>
    toastr.options = {
        "positionClass": "toast-top-right",
        "showDuration": "9000",
        "hideDuration": "9000",
        "timeOut": "9000",
        "extendedTimeOut": "9000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "320px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>

@stack('scripts')

</body>

</html>

