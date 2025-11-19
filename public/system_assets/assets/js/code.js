document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("#delete").forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const redirectLink = this.getAttribute("href");

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = redirectLink;
                    Swal.fire({
                        title: "Deleted!",
                        text: "Student Data has been deleted.",
                        icon: "success",
                    });
                }
            });
        });
    });
});
