# Ambulancequipo
This project is done as part of the Future Ready Talent Virtual Internship Program organised by Microsoft.
### Problem Statement
Major cities in India are dealing with increasing road traffic which directly impacts emergency services like ambulances, leading to a **delay in admitting critical patients** in the hospital on time. In emergency conditions the patient must get to the hospital as soon as possible. But in many cities, it is common to see **ambulances unable to commute in major traffic jams** and get to the hospital on time. The Hospital or a private firm that owns an ambulance is not always aware about the **live location** of the ambulance and the **working condition of the paramedic equipment** like
- Suction Units
- ECG Monitors
- Defibbrillator, etc.,

deployed in it. Also, there are no means through which the hospital to which the patient is taken know the patient's details and his/her condition when under paramedic supervision i.e., while in the ambulance is enroute to the hospital.

Through this web application, we can aim to solve such critical problems and may thereby help a tender life live longer.

### Project Description
To overcome the challenges pondered over in the problem statement, I ideated a web application with the following functionalities:
1. **Live Tracking of the Ambulance:** A Live Location feature is implemented through which the paramedic staff of an ambulance can share their live location with the hospital that owns the ambulance. We could further extend this functionality such that the live location data is shared even with the hospital or any medical institute to which the patient is taken for admission.
2. **Equipment Damage Control:** The paramedic staff can also update the status of life-saving equipment in the ambulance which can be used in replacing the worn-out devices.
3. **Patient Information Management:** The paramedic staff could share information about the patient's personal details and health condition to the hospital that owns it, so that they can do necessary arrangements for patients’ treatment. The information includes:

   + Personal details like name, sex, age, contact no., and residential address
   + Health emergency details
   + Patient Attendee details
   + Chronic medical conditions the patient is already suffering from
   + Allergies the patient has (if any)
   + Blood Glucose levels (Blood Sugar) information computed using Glucometer
   + %Sp O2 - Proportion of Oxygenated Haemoglobin
   + Pulse Rate (bpm)
## Azure Services used
* **Azure App Service** to host the PHP Web App: B1 Plan (free for a month)
* **Azure SQL Database** to host the DBMS Server: Compute Gen5 General Purpose Serverless Architecure (vCore based pricing tier)
## User Interface
### Sign In
Use any of the below listed credentials in order to login to ambulancequipo.
* The ID starting with A belongs to the Admin
* The IDs starting with M belong to Management
* The IDs starting with D belong to paramedic staff

|        ID        | Password
|----------------|--------------------
|A001|`pass111`
|M001|`pass001`
|M002|`pass002`
|D001|`pass011`
|D002|`pass012`
![Sign in UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/signin.png)
### User Roles, their scope of operation and UI
* **Admin:** The admin can add new management accounts. He can also view the hierarchy of ambulancequipo users i.e., a tree diagram illustrating the cities, hospital managements registered with ambulancequipo in that city and the ambulances working under them.
![Admin UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/admin.png?raw=true)
* **Management:** The management can live track its ambulances which are active at the moment or view the history of the management's ambulances that have transported patients. The management can also view equipement damage complaints and mark them resolved if and when rectified.
![Management UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/management1.png?raw=true)
![Management UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/management2.png?raw=true)
![Management UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/management3.png?raw=true)
![Management UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/management4.png?raw=true)
![Management UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/management5.png?raw=true)
* **Paramedic Staff:** Paramedic Staff can fill a form to mention personal and emergency details of the patient it is transporting to a medical facility. After filling the form they can start sharing the live location of their ambulance to be live tracked by the management. In addition, they can file an equipment complaint such that the management can know the damaged equipment's details and resolve them as and when needed.
![Driver UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/driver1.png?raw=true)
![Driver UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/driver2.png?raw=true)
![Driver UI](https://github.com/PAANCHAJANYA/ambulancequipo/blob/main/README_images/driver3.png?raw=true)
