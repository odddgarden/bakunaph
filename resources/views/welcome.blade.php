<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BakunaPH</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Dark background */
            color: #E0E0E0; /* Light gray text */
            margin: 0;
            padding: 20px;
        }
        header {
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 40px;
        }
        main {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #1E1E1E; /* Darker gray for card */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #E0E0E0; /* Light gray text */
        }
        input {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #4CAF50; /* Medium green border */
            border-radius: 4px;
            background-color: #2C2C2C; /* Dark input background */
            color: #E0E0E0; /* Light gray text */
        }
        button {
            background-color: #4CAF50; /* Medium green */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #388E3C; /* Dark green on hover */
        }
        .result {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: #1E1E1E; /* Darker gray for result card */
            color: #E0E0E0; /* Light gray text */
        }
        .result h2 {
            color: #4CAF50; /* Medium green */
        }
        .result p {
            font-size: 18px;
        }
        .result strong {
            color: #4CAF50; /* Medium green for positive result */
        }
        .result strong.no {
            color: #F44336; /* Red for negative result */
        }
    </style>
</head>
<body>
    <header>BakunaPH</header>
    <main>
        <form action="/predict" method="POST">
            @csrf
            <label for="disease_name">Disease Name:</label>
            <input type="text" name="disease_name" id="disease_name" required>

            <label for="current_cases">Current Cases:</label>
            <input type="number" name="current_cases" id="current_cases" required>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>

            <button type="submit">Predict</button>
        </form>

        @if (isset($result))
            <div class="result">
                <h2>Prediction Result</h2>
                <p>Outbreak Prediction: 
                    <strong class="{{ $result['OutbreakPrediction'] ? '' : 'no' }}">
                        {{ $result['OutbreakPrediction'] ? 'Yes' : 'No' }}
                    </strong>
                </p>
                <p>Probability: {{ $result['Probability'] * 100 }}%</p>
                <p>Message: {{ $result['Message'] }}</p>
            </div>
        @endif
    </main>
</body>
</html>
