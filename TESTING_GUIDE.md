# Enrollment System Testing Guide

## Prerequisites

1. **XAMPP Running**: Ensure Apache and MySQL are running
2. **Database Setup**: Database `lms_latangga` exists with all migrations run
3. **Test Data**: Users and courses exist in the database

## Step 1: Verify Test Data

Visit: `http://localhost/ITE311-LATANGGA/test_enrollment.php`

This script will:
- ✅ Check for students in database (creates one if missing)
- ✅ Check for instructors (creates one if missing)
- ✅ Check for courses (creates 5 if missing)
- ✅ Show current enrollments
- ✅ Provide testing instructions

**Default Test Credentials:**
- **Email**: `student@test.com`
- **Password**: `password123`

## Step 2: Login as Student

1. Navigate to: `http://localhost/ITE311-LATANGGA/auth/login`
2. Enter credentials:
   - Email: `student@test.com`
   - Password: `password123`
3. Click **Login**
4. You should be redirected to the dashboard

## Step 3: Navigate to Student Dashboard

After login, you should see:
- Welcome message with your name
- Three stats cards showing:
  - Enrolled Courses count
  - Available Courses count
  - Total Courses count
- **My Enrolled Courses** section (may be empty initially)
- **Available Courses** section (should show courses)

## Step 4: Test Enrollment Functionality

### Open Browser Developer Tools (F12)

1. Press **F12** to open Developer Tools
2. Go to **Console** tab (to see any errors)
3. Go to **Network** tab (to monitor AJAX requests)
4. Keep it open during testing

### Click the Enroll Button

1. Scroll to **Available Courses** section
2. Find any course with an **Enroll** button
3. Click the **Enroll** button

### Verify Expected Behavior

#### ✅ Immediate Visual Feedback
- [ ] Button text changes to "Enrolling..." with spinner icon
- [ ] Button becomes disabled (grayed out)

#### ✅ No Page Reload
- [ ] Page does NOT refresh
- [ ] URL does NOT change
- [ ] You stay on the same page

#### ✅ Success Alert Appears
- [ ] Green success alert appears at top of Available Courses section
- [ ] Alert shows message: "Successfully enrolled in the course!"
- [ ] Alert has a close button (X)

#### ✅ Course Disappears from Available
- [ ] The enrolled course fades out smoothly
- [ ] Course is removed from Available Courses list
- [ ] Available Courses count decreases by 1

#### ✅ Course Appears in Enrolled
- [ ] Course appears at top of Enrolled Courses section
- [ ] Course fades in smoothly
- [ ] Shows course title with info icon
- [ ] Shows enrollment date (today's date)
- [ ] Has green "Enrolled" badge
- [ ] Enrolled Courses count increases by 1

#### ✅ Counters Update
- [ ] "Enrolled Courses" stat card number increases
- [ ] "Available Courses" stat card number decreases
- [ ] "Total Courses" stat card stays the same
- [ ] Badge counts in section headers update

### Check Network Tab

1. In Developer Tools, go to **Network** tab
2. Look for a request to: `course/enroll`
3. Click on it to see details:
   - **Method**: POST
   - **Status**: 201 (Created) or 200 (OK)
   - **Response**: JSON with `{"success": true, "message": "...", "enrollment_id": ...}`

### Check Console Tab

1. In Developer Tools, go to **Console** tab
2. Should see NO errors (red messages)
3. May see normal log messages (gray/blue)

## Step 5: Test Error Scenarios

### Test Duplicate Enrollment

1. Refresh the page (F5)
2. Try to enroll in the SAME course again
3. Expected behavior:
   - [ ] Error alert appears (red)
   - [ ] Message: "You are already enrolled in this course."
   - [ ] Button re-enables
   - [ ] Course stays in enrolled list

### Test Without Login

1. Open new incognito/private window
2. Navigate directly to: `http://localhost/ITE311-LATANGGA/dashboard`
3. Expected behavior:
   - [ ] Redirected to login page
   - [ ] Cannot access dashboard without authentication

## Step 6: Test Multiple Enrollments

1. Enroll in 2-3 different courses
2. Verify for each enrollment:
   - [ ] Smooth animations
   - [ ] Correct counter updates
   - [ ] Courses move from Available to Enrolled
   - [ ] No page reloads

## Step 7: Test Edge Cases

### Enroll in All Courses

1. Keep enrolling until Available Courses is empty
2. Expected behavior:
   - [ ] When last course is enrolled, Available section shows:
     - "Great! You're enrolled in all available courses."
   - [ ] Message appears in green alert
   - [ ] No more enroll buttons visible

### Refresh After Enrollments

1. Press F5 to refresh the page
2. Expected behavior:
   - [ ] All enrollments persist
   - [ ] Enrolled courses still show in Enrolled section
   - [ ] Available courses don't include enrolled ones
   - [ ] Counts are correct

## Common Issues & Solutions

### Issue: "Course not found" error
**Solution**: Make sure courses exist in database. Run `test_enrollment.php` to create them.

### Issue: AJAX request fails (Network error)
**Solution**: 
- Check XAMPP Apache is running
- Verify route exists in `app/Config/Routes.php`
- Check browser console for errors

### Issue: Page reloads instead of AJAX
**Solution**: 
- Check jQuery is loaded (view page source)
- Verify `e.preventDefault()` is in the script
- Check browser console for JavaScript errors

### Issue: Enrolled course doesn't appear
**Solution**: 
- Check Network tab for successful response
- Verify response has `success: true`
- Check browser console for JavaScript errors

### Issue: 401 Unauthorized error
**Solution**: 
- User not logged in
- Session expired - login again

### Issue: 500 Server error
**Solution**: 
- Check `writable/logs/log-[date].log` for PHP errors
- Verify database connection
- Check Course controller for errors

## Success Criteria

All these should work:
- ✅ Login as student
- ✅ See dashboard with courses
- ✅ Click Enroll button
- ✅ No page reload
- ✅ Success alert appears
- ✅ Button disappears/disables
- ✅ Course moves to Enrolled section
- ✅ Counters update automatically
- ✅ Can enroll in multiple courses
- ✅ Duplicate enrollment prevented
- ✅ Data persists after refresh

## Testing Checklist

Print this and check off as you test:

- [ ] Test data created (via test_enrollment.php)
- [ ] Login successful
- [ ] Dashboard loads correctly
- [ ] Available courses visible
- [ ] Enroll button works
- [ ] No page reload on enroll
- [ ] Success alert appears
- [ ] Course disappears from Available
- [ ] Course appears in Enrolled
- [ ] Counters update correctly
- [ ] Network request successful (201/200)
- [ ] No console errors
- [ ] Duplicate enrollment blocked
- [ ] Multiple enrollments work
- [ ] Data persists after refresh
- [ ] All courses enrollment works
- [ ] Logout and login again works

## Next Steps After Testing

If all tests pass:
1. Document any bugs found
2. Test with different browsers (Chrome, Firefox, Edge)
3. Test on mobile devices (responsive design)
4. Consider adding features like:
   - Unenroll functionality
   - Course search/filter
   - Enrollment confirmation modal
   - Email notifications
