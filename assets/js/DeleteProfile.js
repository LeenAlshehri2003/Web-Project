function confirmDeletion(profileId, profileType) {
  if (confirm('Are you sure you want to delete your profile? This action cannot be undone.')) {
      window.location.href = `../php/delete_profile.php?profile_id=${profileId}&profile_type=${profileType}`;
  }
}