Laravel v10.18.0 (PHP v8.1.13)
Bootstrap v5.3.1 (https://getbootstrap.com/)

### Installation (using docker)
- Step 1: Run command line to install vendor
```bash
    composer install
```
- Step 2: Create file `.env` for API, refer `.env.example`
```bash
     cp .env.example .env
```
- Step 3: Run command line to generate key
```bash
    php artisan key:generate
```
- Step 4: Run command line to jwt secret key
```bash
    php artisan jwt:secret
```
- Step 5: Run command line to run migrate to create DB
```bash
    php artisan migrate --force
```
- Step 6: Run command line to add default DB
```bash
    php artisan db:seed
```
- Step 7: Run command line to add storage link
```bash
    php artisan storage:link
```
- Step 8: Run command line to install npm dependencies
    npm install
- Step 9: Run command line to npm
    npm run dev

- Run command line
    ```
    1. Log router list
        php artisan route:list
        php artisan api:routes
    2. Add component
        php artisan make:component NameComponent
    3. Add enum
        php artisan make:enum NameEnum
    4. Migration
        - create table: php artisan make:migration create_{table_name}_table
        - add column: php artisan make:migration add_{column_name}_to_{table_name}_table
        - add more columns: php artisan make:migration add_{column_name}_and_{column_name}_columns_to_{table_name}_table
        - change column:  php artisan make:migration change_{column_name}_column_in_{table_name}_table
        - rename column: php artisan make:migration rename_{old_column_name}_column_to_{new_column_name}_in_{table_name}_table
        - delete column: php artisan make:migration remove_{column_name}_in_{table_name}_table
    5. Clear config
        php artisan config:clear
    6. Clear Cache
        php artisan cache:clear
    7. Clear Route Cache
        php artisan route:cache
        php artisan route:clear
    8. Clear View Cache
        php artisan view:clear
    9. Clear Config Cache
        php artisan config:cache
    10.  Clear all
        php artisan optimize:clear
    ```
    1. Run test
        php artisan test
    2. Create unit test
        php artisan make:Test Services/UserServiceTest --unit
    ```
- Website running default on : **http://localhost/sankei-workflow-management/public/**
- Account admin:
    ```
    Username: user1@gmail.com || user2@gmail.com || ... || user30@gmail.com
    Password: 12345678
    ```

## Git Flow
- Step 1: Change label of task to processing
- Step 2: checkout to dev, pull newest code from dev
    ```
    git checkout dev
    git pull origin dev
    ```
- Step 3: Create branch for task, base in branch `dev`

    **Rule of branch name:**

    - If issue have label is `'task'`, branch name start with `task/`
    - After that, concat with string `wf-mng-[issueId]`

    Example: Issue is `task`, Id is `123`, Name is `Create Page login`. Branch name is `task/wf-mng-123`
    ```
    git checkout -b task/wf-mng-123 dev
    ```
- Step 4: When commit, message of commit follow rule
    - If issue have label is `'task'`, branch name start with `task: `
    - Next is string `[#[issueId]]`
    - Next is commit content

    Example: `feat: [#123] Coding layout for page login`
- Step 5: When create merge request
    
    **Rule of merge request name:**
    
    - If issue have label is `'task'`, title start with `task: `
    - Start with `[#[issueId]]`
    - Next is  merge request content

        Example: `task: [#123] Page login`

    **Rule of merge request description:**

    - In **`What does this MR do and why?`**, replace _`Describe in detail what your merge request does and why.`_ with your content of this merge request
    - In **`Screenshots or screen recordings`**, replace _`These are strongly recommended to assist reviewers and reduce the time to merge your change.`_ with screen recordings of feature or task for this merge request
    - Check the checklist
    - Select approver
    - Select merger


### Coding convention

- There needs to be 1 space before and after operators such as +, -, , /, ., >, <, ==
- Variable names are written in camelCase form.
- Response JSON is written as snake_case.
- Use the ' sign for a normal string. Only use " when there are PHP variables inside.
- Functions should not exceed 30 lines
- Classes should not exceed 500 lines
- A function cannot exceed 5 parameters, should keep <=3
- A function should only do one thing
- When declaring a variable, a line contains only one variable
- Nested statements up to 4 levels
- Function names must start with a verb (what to do)

## Visual studio code Extensions
- GitLens
- EditorConfig
- Docker
- vscode-icon
- Laravel Blade Snippets
- Laravel Snippets
