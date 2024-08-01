Software Requirements Specification (SRS)
1. Introduction
1.1 Purpose
The purpose of this document is to outline the software requirements for the Daycare Diary app, which will facilitate the tracking of student records such as learning activities, meals, toileting, photos, videos, observations, attendance, fees, school bus tracking, and messaging between teachers, parents, super admin, administrators, managers, and other staff. The backend will be developed using Laravel and will later be integrated with a Flutter mobile app.

1.2 Scope
The Daycare Diary app will be used by daycare centers to manage and monitor daily activities, ensure effective communication among stakeholders, and maintain accurate records of student activities and information.

1.3 Definitions, Acronyms, and Abbreviations
API: Application Programming Interface
CRUD: Create, Read, Update, Delete
RBAC: Role-Based Access Control
SRS: Software Requirements Specification
1.4 References
Laravel Official Documentation: https://laravel.com/docs
Flutter Official Documentation: https://flutter.dev/docs
2. Overall Description
2.1 Product Perspective
The Daycare Diary app will be a new, standalone system designed to integrate with a mobile application. It will consist of a Laravel backend and a Flutter frontend, ensuring seamless data synchronization and communication.

2.2 Product Functions
User authentication and authorization
Tracking and managing learning activities
Recording and displaying bottle feeds and meals
Logging toileting activities
Uploading and displaying photos and videos
Recording teacher observations
Tracking student attendance
Managing fee payments and due fees
School bus tracking
Messaging platform for communication
2.3 User Classes and Characteristics
Parents: Access information related to their children, communicate with teachers and admin, and view notifications.
Teachers: Log activities, observations, and communicate with parents and admin.
Super Admin: Manage the entire system, user roles, and settings.
Administrator: Oversee day-to-day operations and manage staff.
Manager: Monitor activities and manage specific departments.
Other Staff: Log specific activities as per their role.
2.4 Operating Environment
Backend: Laravel running on a server (Linux, Apache/Nginx, MySQL/PostgreSQL)
Frontend: Flutter mobile application for iOS and Android
2.5 Design and Implementation Constraints
Must adhere to data privacy laws and regulations
Ensure secure communication between frontend and backend
Optimize for performance and scalability
2.6 Assumptions and Dependencies
Users have access to smartphones with internet connectivity
Server infrastructure is available and maintained
3. System Features
3.1 User Authentication and Authorization
3.1.1 Description
Users must be able to register, log in, and log out using either a phone number or username along with a password. Role-based access control (RBAC) will be implemented to manage permissions.

3.1.2 Functional Requirements
Users can register with a phone number or username and password.
Users can log in with their phone number or username and password.
RBAC will restrict access based on user roles.
3.2 Learning Activities
3.2.1 Description
Teachers can log and track learning activities for each student.

3.2.2 Functional Requirements
Teachers can add, edit, and delete learning activities.
Parents can view their child's learning activities.
3.3 Bottle Feed and Meals
3.3.1 Description
Record and display bottle feed and meal times.

3.3.2 Functional Requirements
Teachers can log feeding and meal times.
Parents can view feeding and meal logs.
3.4 Toileting
3.4.1 Description
Track and display toileting activities for students.

3.4.2 Functional Requirements
Teachers can log toileting activities.
Parents can view toileting logs.
3.5 Photos and Videos
3.5.1 Description
Upload and display photos and videos of students.

3.5.2 Functional Requirements
Teachers can upload photos and videos.
Parents can view photos and videos related to their child.
3.6 Observations
3.6.1 Description
Record and display teacher observations.

3.6.2 Functional Requirements
Teachers can add, edit, and delete observations.
Parents can view observations related to their child.
3.7 Attendance
3.7.1 Description
Track and manage student attendance.

3.7.2 Functional Requirements
Teachers can mark attendance.
Parents can view attendance records.
3.8 Fees
3.8.1 Description
Manage fee payments and display due fees.

3.8.2 Functional Requirements
Admin can log fee payments and due fees.
Parents can view fee details and payment history.
3.9 School Bus Tracking
3.9.1 Description
Track school bus location and display it on the map.

3.9.2 Functional Requirements
Real-time bus tracking with GPS integration.
Parents can view the current location of the school bus.
3.10 Messaging Platform
3.10.1 Description
Enable communication between teachers, parents, and admin.

3.10.2 Functional Requirements
Real-time messaging between users.
Notifications for new messages.
4. External Interface Requirements
4.1 User Interfaces
Web-based admin panel for super admin, administrators, and managers.
Mobile app interfaces for teachers, parents, and other staff.
4.2 Hardware Interfaces
Server infrastructure for hosting the backend.
Mobile devices for accessing the Flutter app.
4.3 Software Interfaces
Laravel backend API.
Flutter frontend for iOS and Android.
4.4 Communications Interfaces
HTTPS for secure communication between frontend and backend.
Firebase Cloud Messaging (FCM) for push notifications.
5. Other Nonfunctional Requirements
5.1 Performance Requirements
The system should handle a high number of concurrent users.
Response time for API calls should be minimal.
5.2 Security Requirements
Implement JWT for API authentication.
Ensure data encryption in transit and at rest.
5.3 Usability Requirements
User-friendly interfaces for both web and mobile applications.
Accessibility features for users with disabilities.
5.4 Reliability Requirements
Ensure high availability of the system.
Implement regular backups and disaster recovery plans.
5.5 Scalability Requirements
The system should scale horizontally to accommodate increasing users and data.
6. Appendices
6.1 Glossary
JWT: JSON Web Token
HTTPS: Hypertext Transfer Protocol Secure
6.2 Index
Authentication
Learning Activities
Bottle Feed
Meals
Toileting
Photos
Videos
Observations
Attendance
Fees
School Bus
Messaging