# Patients microservice
This microservice is in charge of everything about... patients!
Patients are domain entities related to user, living on their own
microservice. There are some interesting fields on this entity, like
"user". This field maps to User.user_uuid, and it's linked through our 
message broker.

## Responsibilities:

1. Add patient
2. Remove patient
3. Edit patient

## Sends data to message broker:

1. PATIENT_ADDED
2. PATIENT_REMOVED

## Is subscribed to:

1. USER_REMOVED
