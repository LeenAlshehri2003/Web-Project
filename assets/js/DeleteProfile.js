function confirmProfileDeletion(profileId, profileType) {
  Swal.fire({
      title: 'Are you sure you want to delete your profile?',
      text: "This action cannot be undone.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
      if (result.isConfirmed) {
          // If the user confirms, redirect to the deletion URL
          window.location.href = `http://localhost/Web-Project/assets/php/delete_profile.php?profile_id=${profileId}&profile_type=${profileType}`;
      }
  });
}