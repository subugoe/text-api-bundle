# TextAPI Bundle
Symfony Framework Bundle that generates TextAPI resources

## Requirements 

- PHP >= 8.1
- Composer
- Symfony >= 6.2

## Installation 

1. To add this bundle to your Symfony application please run:

    ```
    composer require @subugoe/text-api-bundle
    ``` 

2. This bundle requires your custom Translator that communicates with your database layer to retrieve the actual data
from your solution. The translator class needs to implement the `TranslatorInterface`. 


3. Add this configuration to your `/config/services.yaml`: 

    ```
    myapp.translator:
        class: App\Service\[YOUR_CUSTOM_TRANSLATOR_CLASS]

    subugoe_text_api.text_api_service:
        class: Subugoe\TextApiBundle\Service\TextApiService
        calls:
            - setTranslator: ['@myapp.translator']
    ```
   
4. Create a controller that fits your needs and call methods from the `TextApiService`. 
Creating routes is not in the scope of this bundle so you still keep the
full control of your Responses. There is an example controller under `/examples`.

