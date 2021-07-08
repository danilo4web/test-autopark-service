Success (try to add less than 10 cars):
```
php index.php AAA-8999 BBB-9989 CCC-9090
```

Error (try to add more than 10 cars):
```
php index.php AAA-8999 BBB-9989 CCC-9090 DDD-1293 PAD-1239 GGG-1939 UIU-1239 AOSO-1932 AAA-1239 BBB-9192 KIY-9120 KKK-9202
```

To see the output logs both success and fail:
```
storage/output.txt
```

Tests (unit and integration):
```
composer test
```

Test Coverage:
```
composer test-coverage-html
```