# The Interview Task
This code uses Lumen Framework. The app will test a basic functionality of Asana's API - creating a task and a sub task.
### Requirements
- PHP 7.1.3 or greater
- Composer
### Instruction
- Clone this repository
- Go to the project's root folder and run ``` composer install ```
- Create a ``` .env ``` file and append your Asana API token, Workspace ID, and Project ID
```
ASANA_TOKEN=<Insert API TOKEN>
ASANA_WORKSPACE=<Insert Workspace ID>
ASANA_PROJECT=<Insert Project ID>
```
- Access the trigger at ``` http://localhost/trigger?assignee=<email or user id>```
