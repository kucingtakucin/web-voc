<script>
    const BASE_URL = "<?= base_url('login') ?>"
    $(() => {
        const login = (form) => {
            if (!grecaptcha.getResponse()) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: "Recaptcha wajib dicentang!",
                })
                return;
            }

            Swal.fire({
                title: 'Loading...',
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            })

            let formData = new FormData(form);
            fetch(BASE_URL, {
                method: 'POST',
                body: formData
            }).then(response => {
                if (response.ok) return response.json()
                throw new Error(response.statusText)
            }).then(response => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(() => {
                    location.replace(response.redirect)
                }, 1000);
            }).catch(error => {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: "Ada masalah saat login!",
                })
            }).finally(() => {
                $('#form-login').removeClass('was-validated')
            })
        }

        $('#form-login').submit(function(event) {
            event.preventDefault()
            if (this.checkValidity()) {
                login(this);
            }
        })
    })
</script>