<!--

	This is the home page for Devin Hopkins and Tristan Hess' database management term project.

-->

<!-- Included files. -->
<?php

	include 'FunctionsForAll.php';

?>

<html>
	<head>
		<!-- Bootstrap include. -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<meta charset = "utf-8">
		<title> Home </title>
	</head>
<body>

<script>

	// Global variables for the help page
	var helpPage = "<h1> Help Page </h1>";
	var helpWindow = null;
	
	function openHelpPage()
	{
		// Making sure the help page isn't already open, and if it is, close it
		if (helpPage != null)
		{
			helpPage.close();
		}
		
		// WRITE WHAT WE WANT THE HELP WINDOW TO DISPLAY HERE, STILL NEED TO DO
		
		// This is opening the new window with all of the differences added
		helpWindow = window.open("", "Help Page", "width=2000,height=500");
		helpWindow.document.write(helpPage);
		
		// This resets the page variable, and thus resets the window
		helpPage = "<h1> Help Page </h1>";
	}

</script>

<center>

	<h1 style="color: blue">
		Telecom Logging Crux (TLC)
	</h1>

	<!-- Mkaing sure there's good spacing. -->
	<br>

	<img class="disclosure" img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfEAAADWCAYAAADB7LtHAAAACXBIWXMAAC4jAAAuIwF4pT92AAAgAElEQVR42u2dvY7jSPfen12MgT8MAuo3smEH4gJ%2F2GHrjeystbyB1sIXIE7mwMBor6A5gPPRhI6GfQWrvgEtO3G6UubEWCoxXgMGLAFKHI0DHm5zOKRYVazih%2FT8AGFnZ%2FRRrK%2FnnFOnqn74%2BvUrCCHd4%2FnBHMDvpb9%2BbfjYDsDxSqtkBuBOXgDwT%2FI6Avi3AP4fgH8J4G%2Fy7z%2Bf023CnkRumXesAkJ6w6%2F4u4eGzzzcYD1N2VUIqeZHVgEhvXqehBBCT5yQGxTxA4AUbyF23VD7DMAng9%2F9eE63kc4HPD8ohspnhRe9bEIo4oSMEpPQ%2BCuAGEByTrdpmx%2F3%2FKCzBz2n213hfzeFMvgAQgArABN2CUIo4oQMHhEvHfYAVteWyCWGSOT5wRrAGsCSvYMQdbgmTkg%2F6ITSnwHMrzkT%2B5xuj%2Bd0G6I5O58QQk%2BckNGI%2BPtzuo1vqF7WuM0MfEIo4oSMiHnDv58ALG5wH%2FSRXYMQijghY%2FbET8jC5ztWEyHkElwTJ6RjPD%2B4Q30mNgWcEEIRJ2SkXviCAk4IoYgTMlzmNX%2F%2FK88CJ4RQxAkZnyf%2Bck63a1YNIYQiTsiw8Uv%2Ff0J2ahkhhFDECRk496X%2FD8%2FpllurCCEUcUKGjNwhXuT1nG43rBlCCEWckOFTXg8PWSWEEIo4IePAL%2Fz5ue1NZIQQijghpB9PPGJ1EEIo4oSMhwd64YQQijghI8PzA3rhhBCr8AIUQrrjiOxu8CO9cEIIRZyQESHCHbImCCG2YDidEEIIoYgTQgghhCJOCCGEEIo4IYQQQhEnhBBCyKBgdjoh5Gbw%2FMDH91fBpkPc8uf5wR2%2BPeHveE63O7YioYgTQm5NuFcAFgCmNe8BgFcAGwBx11fDykFAc3nNGsqZlzUFkABIeO4ARZwQQq5NvO8ArAEsFT%2FyIK9Pnh88A4hciqOUb4Xs7ICyaB8KIj2T6MF9RVmX8l2vYnzEbHmKOCGEjF3AFwBiABPDr1gCWHh%2BsLItjA3GxWcA6yrjoSD6q4rnegDw4PnBWoyPNXvBbcDENkLItQn4GsBvLQQ8ZwLgi%2BcHscWyrcTDLgv4HsDfz%2Bl2Vef9n9Pt8ZxuI%2FHM9xfK%2FMnzg13prH5CESeEkMELeAzgg%2BWvXYph0Mr79vxgA%2BBThXGxBzBXTVoTkZ9fEHIgC73%2FIUYDoYgTQsgoBHzp6Os%2FSIjepFwzZGvbjxX%2FnAu4ViKdvH8O4NTw1k82IwmEIk4IIV0L%2BGvh1YZY1qVNBPy%2B4p9PABammfDyORVPe0khp4gTQshQBTwsCfgJWYLY38%2Fp9odzup0XXj8A%2BAnAe1wOR1cxURTNvFx3IuB1a%2FOts98l6e6gKORMdqOIE0LIoAR8hizTO%2BcFgC8JYrsa4UvP6TY%2Bp9sZgJ%2FRHJIuslLxxhUE%2FGAxgzxSfJ%2FxkgChiBNCiAviglC%2BP6dbrfD0Od0myPZgq3rlE6jdCR%2BhOoSuK7yq3riqIaK9JEAo4oQQ4oJVQSjfm%2B7nFtEPNT4SNnjhc1zOkD84OJQl0TBCGFaniBNCSO88thXwgpDvADwrvv2%2BwZttKosLEd1ovHfJPeQUcUIIGQIvFr3aSOO9sxovPETNuecaIm%2BC7sUo3D9OESeEkN6xJkaSKa66Nj43NAReXFyuYnC72VIuhiEUcUII6YVnBxeUqIal7yq88IWCF75xWB%2B6W%2BaYqU4RJ4SQ3nAhiKpeclU4PeypzLpl1ykvGTi8xYwQMlZc3Pm9M%2FmQJLo9qoi4JJVNBlB%2F954f%2BLyLnJ44IYTcOnPF9z0MRMB1y03oiRNCyE2L%2BDOya0iHBL1wijghhFDEFd4TywlxhFiD4XRCCGnPfdMbKOCEIk4IIQOD%2B60JRZwQQsYLRZxQxAkhhBBCESeEkC7hZSKEIk4IISNF6X5uuaKUEIo4IYQQQijihBDSFtWjWumJE4o4IYQMjDaXphBCESeEkBFAT5xQxAkhZGCkiu%2BbyA1mhFDECSFkCGhe5RmyxghFnBBChsVe8X0LVhWhiBNCyLBQzVCfen4wCG%2Fc84OQ4X2KOCGEEHURBwYQUhdD4gsY3h89vE%2Fc3qC4w7C2kOzO6fY48ud08gyEOCDReO%2BD5wfhOd3GPZY3kv%2FGbDqKOMmYAfh9QOX5WXNiGeJzunoGQqxyTrc7zw8OAKaqIur5waYPI9Xzg0jKeTin2x1bb9wwnG6PI4BXAIcBlOUV6gdQmDznqcM6JWQsbDTeOwWw7kHAZwCeDMpL6IlfvyWO0mEOMmBmyNadHhz87F4GYoKOQs%2FynHeFZ5zL%2F8%2Flda%2F5lSd5hl3%2BYgidjJQYwAeN9y89P0i6CqvLUtimVF5CEScNgrcDEIvYbQBMLIn36pxukwE8Y1K06sVwWSsYLQcAUc%2Frgr0gfSE3%2BFIAieZeYzLQ8e75waumwf7F8wO4Hgci4Anewv2vNkPppT59BLBhn6aIX9sATzw%2FWKD9evLzOd2GQ49IeH4QA1heMELmt%2BZxS%2FvHVYacTP4hJ77RExmMcadCXhDwe9teuPTpNb7PBfjEPt0NXBPv3mt9bfEVL0MW8NKzhjXPerpRAY8B%2FIb6SMwDgB337d7sGP8iCWe2%2B90MWTSwKOAHGwZDoU9P2acp4rdEm8GzGtmzViXurG%2FUA18qvHUCYCOeExm3N27Ck%2BcHOwlNt%2Fa%2BxSj4o0JkI%2FZpijgxJ23hhadjetBzut3g%2B0z29Q22uc4zT0dgrM05jHHX4I1%2FNvzeewC%2Fe36QmIh5QbxTvGWhF3m1FLa%2Ftj49Wrgm3r2wJZ4fmHw0Gekj7%2FCW6LO%2FQS98DvW9wzkLG96SArOOP9dKHPsW5wqxbfLG59DfrZHzIGJ%2BwLc7UNKKPpbvglkAeGz43tWV92mKOBm0GI5dxG9x65iJ13rfUdlMJ%2FSJwxPH%2BvbylQ0Uzw%2Fu6ozSc7o9ytGmCdrtSJki27b2QX6zzbP9aikjfch9%2BuZgOJ245ngF0YRrjBCsDLypImvPD3wHRdO55ctFRGBmq6yFsyNOA2jy53O6XbPnU8QJIXqkAxTwEMCnll%2BTJyzNLJdLx7CYWa6XOzSHo4uETW8YiJDvYXdNOuWwpogTciskBp95cSTevucHG2S3V9ngHkBiY2tU4ZAgHZaWty%2Fp%2Fv6DbLNSFfJ9D%2F3PxZkMg%2BnThCJOiFMkEUl337DVsKfnBwsRmz81PU1Vj%2FzJ84Oj5wdrXVEVw2KNbCuUydpx3FbIJaM7htqWqSpDYtO0tFAQ8s8ddr%2Fnc7qd2U4mHUKfJm8wsY0Q94TIEvxUROrZ9DhdEbN8ndZHFm7uKqFoAknAkuSrV3nmo0z8kZRxLmKWn7fftnz3AP7w%2FCC%2FRyBFduTn8ZJoSz3lddTWsHkE8ChlSPB27OiuJH5HACuJhkRwc58CkB1pvJItnqPu04QiTsggvPHC2fnThskubPFTC1TvDe6Dh5JIRfJfV9fY3hcMghSXQ74z2FtSqCtDbqxU9YcE2dHEc2Rr1baiIwdkh0k5P1Cpwz5NKOKEDELI8%2BMnVyK2%2BWR%2FEsFZW%2FBWUrQ71rcLuijfUeHfXZdjp9AnEmQ5Bb4I%2FkL%2Bq7OscJD%2Bs3HseffVp0kDP3z9%2BpW10DGeH5hU%2Bs9jHBCS9JR7hx%2FzsCohpHbM%2BMhC%2FfmrygjZAUh5uQihJ04IIQNChJniTJRgdjohhBBCESeEEELcIdsBeSMaRZwQQsjIBNxHljDH%2B8kLcE2cEELI0AV8hvaXydATJ4QQQijgFHFCCCGkScBDmB%2FJSxEnhBBCehTwL6wJijghhJBxCfiaAq4GE9sIIYQMScBjmN0oRxEnhBBCehLvO2QXuDyyNiji5LoH%2BxzZrViRznnyMkmEeLthqpws84rsVqZN12dSyx7YCMDdOd0u2MqjFKAVsitA7xQ%2Fs8DbnuejjX4n5Sjuo965vtHMRp%2BWcifo7upcijghPUwKoUwKU4OJbY3mEF1%2BfeYnzw%2BexUhIHT9TPtEtC4YE%2BV6U5sjuIK876CO%2Fuzzp8qKgonhDMYNaLgWqen%2Fe71Yqwit9J7%2F5bFY3LuR%2B97xv5Zen7ETg0777tLx%2FQwGniBOKd9VnV%2FJZ3S0qSwALzw9W53QbO4wmPNQ8r991PV%2B6Yc5hmb4T3ULEZFFVPxcMMAB4EtHKoyqxC0%2FUULzvpEwPDf1u5vnBvK7c0hahRt2U6%2Bix8F35VaaJRAKOLvr0hc%2BY7AEP5beq%2BCcA%2F1HhO%2F4HgH%2B06AKxqgEkRpsrYoo4uVbxtrG%2BNgHwxfOD2TndrlyLd3GSMpigbRD1VKakxoPLOUlbblAID4sAzEVIp11EVUzEu%2FC5RNHbvJfvjyr6TlwzHvby%2FUf5r194zS%2BMoanU91L6%2Bl5%2BQ9n4MRHvFgIO2El6e7DQZ1X705PDMZtQxMlVibfBhKnCB88P7s7pNmz5TCvFMsUyGd%2FJJDx1UM17vIVWj4pl2iEL295ZqNu9TIKJtFcE4EPF%2Bz6LAB8rIgd5WHjdEHFZAlh6flD7XRptuIbZwSO6%2FfEbEZctV1X18wqF3BARzJVENyYNBsQnaeNIoT6MjLsR7QE%2F5P209Pc6BuFH%2BW9uVJkaEXlZ0sLvpxRxcjXi3dK6b7T%2BPT9IL4WcbT2ThO%2FjklGysOANH6Qs2mHT8pJCoUw6z3YSEVwXvOm5CHHVd7xXXco4p9u15wdJQ9t%2FQLZEshADoCujcm1g9EwKdVNnADyrGpbyvKFEO9ZtIlQW6mMMAr4HsLARvambM2SuWjREdfIxUxu%2Bp4iTqxBvxwKe8%2BT5gVLilK1nkkngKKIey8S%2BMXjGE4CZrfXhvEyeH2ygljT4XcJWw2T%2BXjcX4Zxud1I%2Ff1x42xTAH54fNH6%2FJaNyXuNBt%2FXgX00iQyIECxMhtVQf65b10RUr10mteSRJxlDVvLUHMG8aszyxjfQq3p4fpDKZtBXwuwpxOyELZf39nG5%2FOKfbHwD8DcAvIiombOruM5a7jiNbz1Qz8BNka5wn3XK7SPCS71yJl48LghyWBDy%2BICIfTZMJZWL8qPDWLyJKlcLr%2BcHOUhvGLT77Xy548FHLdosB%2FL2pH9ns0yMScEBticmmmEcmAk5PnPQl3nPUJ%2BiYCnhS%2Br7K9U%2F5%2F42IcQT9rS0TGXCrUhnyv5t0Mejl9z4NYVI6p9ujTNBV5fm1IhR%2FyXPf6y5ZVJQnEoFu6l9fPD%2F4a6nANEHrQr9ctezj%2F%2BlCHSWW%2BlEI4LeKf76z3aclOXR1ob6%2BKn7VzwbnQ6SazzFHtpTRFeXfWqga3fTESefIAFwA%2BBXAi4WvLArxCcAv53TbuNf2nG7Tc7qdGXjlH2RtsexxreS7Dh3U4Vrzd2YdT0IA8CLl%2FCb60uCNrSyVR9UQ%2BCLLMLmhs5E%2BeWrz44VkPRckFvvRpiZyMeu6T7s0MmW%2B0WHVcTGL88mzTiifIk76Gli7c7pdy0lOf4NaCLRqsowLntMJWQhqo1mWEFn4ylgkxCCIJWzsA%2FgJwHu4PbxlPSARL3NAlohXbKsZLq%2FDPls8qGWjIcQb2X3wV5%2BUU9d%2BMegXRREoen4fAfwsfaKtIB4tj8Wo6jl76tMuHQedck%2FrllscMTMwQCniZDiWskwk7zU%2FGuLbsOxcJ%2Bu4xELT%2B1ooePnxOd3ODZ5LlVijzBM55rMrwopISGzJe1b1vlSNuWmV53VOtxuJ1JhEi4oC8P6cbqNzuk0kdD9rMA7%2BVw%2FDcKVQp130aZdEtuvEIvnYfNFNqKOIkyGJeaxpLRcF%2FNcWAp5n7ep4tsqiKM%2F14qC%2BjtBLnHIp4vPCn%2FcVp7BFuJx78OogG1jHq3%2BqWCKpEuRGSuvxL%2BWcAGm3ObK8jaIRdkIWum4aAzMHfUnLU3XVpwfmjd9fOBnOGhKhyvvLRvfzFHEyNDYGn3ktr70aovsdOqLoKklGp8zLusx6yyJeXgf3Fbya2EGZEs33RxeMJZ3JPyyIclj3nZK3cZfvnJA%2FhwD%2BTcP3P14wOGx5qn6PffrWvPFif6GIk9FjMjFYGWgyWeskuc37rizxXnUExro3LoLyV15Cxfawpgznk4vz6aVudJZIlhfEUadf5nWxdniD2Ma2QSaear5eP73GycXAG3dlMFWJuNE2UIo4GTsvbcLoLSMBQ5nodATQhWcRXfDC79Acjt44rBvdvlFn5OhOrifoR3Z0uHch5I7bAiMcLybeu44BHBYMXKP%2BQhEntzYgm0g0B%2BEQvPFYw%2BO8L2ypsjEJ3ZWEb10hik37c10Kh6742jJy1h3c4%2F2A7Ox5m2vkG%2FFUr%2FZKXBkvOjsEXC5D5Qbu3tQZ4WEvZOwDcmP5%2B45yPePYwokx1E%2FDWkEzWavBc81F%2BrlCuFREcW4oRCoGlK%2F5nVPPD3wLSXZtjMsd1A%2BcuUd2jOxHG4ZD4UTAayeC3rGzK9seeWkZyjhqQxFXq%2BiZvPzSpJAguxpxw5rqBVfeQjpCEdc50nIh%2B6JteIpRnRcu3ovKaXhDO4pzgXah8H1LI8DEI3sCsJLT8LqIAozeG5cdE6rjfOX5ge16zQ1co4Q2inizcIfyutTID%2FL%2BA7ID8ynm14GOJzSUSSn1%2FOBVsdwTEaq45TiZF8bHa0U4UCWJLr9ecUi0DZ1uLHze5JavCcXcmTduZcyUCPP2btNOFPHvPYeowjN4FU%2B8bm1vCuA3zw%2Be29w5TQbDWCe%2BWMP4CC1MSGHpt8uohMgjF5npPZO0NMiOnh88o%2FlmOFUxj13fyHUj3nhkS8RtJLTlMLHtW68iLQn4HsBPckKRijgv5RhQQnqZlKCe4PbQZuuMfDYXmUONEKuIOMWlXjDakov5n54fxB1slRqr4auKzaNYF4Wx02p3DUX8zSr6Hd9fY%2FnXpfAaofJlx2fuEmI6KbXJxC728TpP4oHNYWyQpchOdLPFkmJeyRp6Zwm0ntul%2Fh9teOEU8TcBr1oXqQpBqV6GsOLYID1OSl1MSGHB2I1bfA898XohX8H8AhaKuVodHzXHzIOFbaWhodFNEa8Q8DnqExviFhPkPQjpz4NTzdqfmESNSmeDVyblaEx0TLy6zNyBkBfFPHK4B5re%2BOXPP9tIPLxZEZeOWxciP9WsU2zQ8p5hQjpAx7o3OYa1OIlFLcs6Y3M1eoquhBzI1sx3lg%2BMuXZvfGkaxZBLk6a2vPBb98TXqM82311obBUrbA9C%2BpuUYg1jU%2Bts6NIBFS%2FMeu5UyJ8d%2FcQU2YExt7wMqCuopsZrrh%2BH8k1%2FFHE9a2iOy9s3dhcG1EZhMHG%2F%2BBt3rILBT0qhxnujkiHcFp9NpSbksn31V7iLBn661d01YozqGEkL3WUI2wltt%2B6JN1lRx4YGvzSYXs7pNgLJYbi0H6wnuJXOSbflSVDE9cRmLWPK1WmFt7xNVmfenkA%2FgTls4flTxEvW0IOlweQD%2BBnARwDvAfz9nG4XIHXsWAWdehaqE%2F1U1uoavQ%2B8LUHZMlTnbC39tpWzK36B3kUeOkK%2BvtExo%2BONm4r4s82T9G7RE1ep%2BESx0Y%2FndJuc0210Trexxqb9W1ozLxpMzETuFh1rX8Ubz4Vb5f7v1KB%2FED3R2ZzTrS9OhO0Q%2BwdFw%2B6mvXHV3R2lhDary623KOJD6Jg3IWYVCVMpSJeTfAy9BLe7C205L0xCa4XfTjX6Cb3xdu0cIYsKfrb81etb235m4I2rin5xGYoi3lJUhnA71a14pDPTiZ0MzhsPDb5T1YDgElR78TnK4TA%2FiZjb8MynN9o2OmOmcSlKDKGlwXdTxAc8WQxibdjzgzu5AMAVRQ%2FrFaQPdNY2VxeM33wSetYwxnYjG5dX4UmKmPvIwuxtiW6wDhPN%2BappidbEAKaIq3iGIxNx37aAI1v7f3J4%2FOJiaIbLLU7q0EtwmzdMQmsH%2FXx6o%2Buvrj3zSDzzNvvLpzd6PKuO8fLQcFhOLvJOzlWgiN%2BgiMugTPB2PGzowMv38e3SBUW8P3Ss%2F%2FDC371q3rik897eDxrx%2FMD3%2FODrNW2xEs88RLaLxjSTfU5v3Kz%2FlnJJnPSrWxPx%2B6EMLIMBZWUgSafalerCxQRaFgMegNNff4uhvka6LCYztTwmMtH0ZvoWi7zPplfYBxJxYl76dCCu2BuvO4o171PWE9puTsQHmGWp26AzC3WwxvdXrgKGF2FoiPirzX2RxLk3vqgw8A4K28raGqvrHucHH9k54r0anHIhyVcXR6BKiH0Bd8e3XqPho7MdeFWhOc4S2m7REx%2FayWG6jToxvaTA84O55wcpgA8annObiajovTntwMSJQK4KwvbQUmB1BPHecaKlyng8aC4ZuI4KuBCnEEw0dTFuwpKzGHYxB%2F7INurNyttBP6SuZZ3LGl8s3nfT1roHizcZFct5AkPpQ%2BhvqcbEfS99YVVoQ9NJSPdzT12H1cVwaGus2Obe8c1iIUeF0riJNebp8lGs%2BZ9fXW6vpYj3i67XoXTofmHr2J%2B4fNFLKyOh5rdDfHsK15qh9MEQa%2FbNfKLfmLahGKu6JxRuuroaU%2FrrUxcekyJHm%2BOxwahjWN3%2BPB1Kv5rDcUIbRXx8Vl6VpVfHrjQxWTUSLhkPJU%2FmNCDPhv1N8wQ32DsnXbcPTAAkroVcBPxL4a%2BeB2Bw7myNRxVjyaBMLjkMeNyolm0q%2FSo3gE%2B6uSQU8fGha22vFAa2aaeZoF2YLca3SXMRvfBRe%2BOAhVCggbFaFPK5IwFflQTchrFiG5ObsnRILL%2BvLar9bN5DW0Sa71104YXfmoj7A7XyNtDb9jFp6hhyyIOpVWs0aYj1%2BVia%2FOmFDw%2FdNrElbCb9agLgd8nYtuKRSp5IAuBT6Z%2BeB3os8MqVN65oYHe5s0TV4%2B8jSXkD9SjWtODMOJ8DKeLDIITeuuGjQhav6eQ71fV%2BKsKSJzBxZpBoJrjZujM8N1ZNM6KfAOzabIMs5InsUH1zWjTQJpug3yWpuMPfUhXxxzanyOUJvzrGkRgyuu3w2oVhyHD6MCbWo4iezqUFT5cmNcMQprbXVCPg8xu67GSMtzypTsy2hW0B84s5pgC%2BeH6Qen6wVl0v9%2FxgITs0UjEGJhVv%2B6jQX%2Fts56WLZQWF7zy4Xs%2Bt8HZVWRs%2B80KMhaXBd6w1%2B28ndUcRH46Q75Ct9eh0ki9ygMslD98EJUtXPJsqAW%2BTCHPn6L2uyqAa2ptb%2Fr42fS1W6GfWtwaKsdr2jPQpsvMO%2FpBDURLxqqLCK5a%2F%2FwrgN5mwJzXft5flJ5vt4qJfbhyE1ZvaIrRUJzON%2FqEarXnUOR5XIjGx9IcJDJJuNb3xU1cGEEV8eEI%2Bg15o%2FYNMWFWi67coTnhhQOTrik%2BWBVx3srx3tF44c%2FBe1fdNOrpwommCcbI1UMLz7y1%2B5YOI9FPhtUR1yLzKUFE1dO8c9Z8ydRGBPNHPVm7AXcOzf1RYSnHRp3WEbylz36zhWVdSr0sLc5WqN97Z2RgU8eEJeSpe22fNiezPigSgsEVRVjXWbIRs%2F3lxknwF4Fs66Sp0%2FH6Vye1B4yONUQtZcpj09UwXJiNbk6lJJOD9AIZbqNJnpX3vu2i%2FhrD%2BvUUhjy%2F0yeem6ERpH7S1OpG%2BoePEPEhUZifLLJEsoawkInNElsQ4seFsiGEbWxhf1vjh69evNidAXwRoJq%2B7C50%2FD5vs8pfL4w5FfFT3Tv9sK6GnZZnnyNYlHzQ%2F%2BgzgvwP4by2L8P6cbmNZR1rg%2B4NjTgBWtsJGsjTwQfNjtiIAeRk2%2BDbLXoW9lOFY8X0zZFt0Jn0904Vn3dWMz2c5mtN1%2Fw7x%2FTavrniv2m8N%2B4RxHcoyQFN%2FC037h4SV6w6B%2Biz3kTcZujtNEVfu0zLv%2Fe6gzVvVW0nn%2Frz0O%2Bd021kGfWsRl0kqlEl%2B2rI8%2BTrcxvaNL2MU8dJkFxqIeVv%2BD4B%2FUSFA%2BXpS65BrwfBr%2B3zP0ncS3TIVyrCC%2BU13B6mTHYB%2FBeB%2Fy5jQ9cKrnmnnIlHwgoh21v9l%2FthYmDt05piwaX6x1C8P%2BXwmbXhUrJNUsT4%2B6oxBeaa45nka60XEtZM%2BLSHwTxbb%2FTMsnlvRYAi97zIh0FjEZQJQmfT2yNYjitbPDNl67X3DYFsDiFUnMLEQZxfCOapHkP4Kte0Ouy4PM7FsMJnwIgZW3PI5EmmnicOyXrS6pS5jDOR6Wp3JqMlT0miHOxmbxXZ4PafbecdG6p3MJU%2BOf%2BpV%2BkR6IRIUOu6XJ5k35grza6Qwzk8FQ%2BE7A1bqNhffpY7AdThGKvu0YWSuypAKbRulF7zxE7Klxc50QVvExRqLGzqXkgBLRSxkAE%2FbWlGa3rYN%2Ft7XjUcywOaFl6uJ538C%2BK9ocX52Rdm%2FdlRNtR6lw5Cda6yKbIVH8b7jbUXl%2BSCC3nn%2FqhN51PRcYlx2Eu06p9sfFOskX8paaIzxfKnyoc0c3eEYqe3T8vyxwfxmLVqo6Y13shRlJOJi0cVoXht6EctHN6S5kgE8udAoF9dfuxyEyLYQDGaPcCEKMQPwnwH8%2B8IElgL4JwD%2FwdBzsGpZdnhLVW2kpCFq0%2BrxAPwzgH%2FIyzZHm4ajGIN%2F5H3lnG79gfTlPOLUZjxrRY6kLjoZ0yaeoQjaXPqtSb3skeVnJCrLlQ7HiFafLkRqQoXIxF7Ee%2BPaG67xxjt37JREXCM559c2R20qro%2FVGgmSiTjpqO46Dzsadqyfckv7QiITXLaroTHSuaDdKmJA34nRsxlY2fL%2BMEe2BJcbGcXlmD2y27%2BOeEuUTa793H4Z636pXsokpkbDgJ95VjFHJOh4eVPKU0x67DShLeedQiFDqGWQtg7DndPtToT8UubjI7IjGBfFCVw%2BN%2Bmw7oY6KMJSaCct%2FH8Ms2SRFbrbMjGDegjvFf1chnBVDPmMe5mUkwGPtz7rJoX6pSHX9sxDMTbjgojHfRTgnSUB%2F2xrHe2cbo8SNrrk%2BU8hNxwVhDwF8HODuNlMbBuqBxiWOliRjaGIT6WuOZESQsgb%2FoX5tl8R1xDwva1s2ZJHHjUIzqQo5AWLve55dDy23RgFS4yfPHZiKMYAABEESURBVILx3eUV53Sben6wh1lIfUVviBBCvpsXgR7vov%2FxguCpHsIQuiiYhPiaztHNhdxnX%2FquLepCpKah00fWMyGEfKOT0z698EoRl0QS1fWGZ8eJRZHCeyZwcznA2DqUj293DsQ1xlEM85ukQg5dQgj5Zj489Bm5rfLEN1BPEItcFk4qRuVWm3sM9z7gPrzwptCOqTe%2B4rglhNALD%2B7wlmPVa2Loj6WChVDff%2Fjc0Z3RqhX0ocP9x0MX8bjhvbHhb0wu3WFOCCFjEmK5JOVr4ZVKPpbOfNtrpvyPJctCx5uNuyig7Fs9DalMA%2ByMFxPaKuo0RXaGcVtjgRBCxupJp%2Fh%2Bx9IUwJPCXeV5VPKlI2dWyRNvOvq0SNdrAKqWzvRGPcVF4c%2BqkQtTg%2Beh6f5eQggZOE3LxktxjqoMgDkGkNCW887Qw9r0UOGqe7yjW%2FLIS2szyp3qnG6TltvN6JG7a89V033OPZbPx%2Fengw325Lx8ic3wmNP8pLhy0myKDo71JE77sMqycVSjdWHBme390Jl38lC6t2J1XXCdATiV09w2N9Ini2Kqu1dxDbP7nBeeH9xxErMv3vKaQGFpq%2BYmwRdklz4kFsq0wNuRpxdPRPT8IP%2FjK95uLUx6vCBoLnX4gOzKzkSjHfJ6vTQnfvH8wFpdk05RjSTeNzhNg9CYdwZeeOfn8MopbjpeY4jhHMvnmpWuF14yxtbQP652giyEH3M%2BsC7eqh5i3R0Dj8j29BtdWSrCHaL5oqM6HuS1lO87iICuuxD0knjrfjbUHA95XV%2B84pSMVsRR4aysSk7QYERcZ8C%2B9lTWREPEH2%2FBUyytzWjnKYhxFMPszt5oTCLe4c6FVHUyV7i5r05oVKInHzw%2F2Kkch6zhfZ5kHOaXjOTja44s5DyvGKNTEfSlCHrk4qrTluKdn41hemPaA7L7HMIbigCOmQTqV1bnhl0%2B9vLPPQ%2FFaHtXt3h%2Fgb7WvnQrbH4D3nhYElUT1oYiPrbz1Lu6O%2FxjU1vIZBBBbwlL9yTFvG1jC2U5yHvq1oGTwvf5qL8TfIosDB0hW%2FdvPT7biHchqpGg%2FeVJEwC%2FeX7Q233sRNl5ScSgVBl%2FnwpX1D4WjNnBnJnxI%2FTvi%2B3L%2BtA1HubX3BFLazMnU4NFrMkXC0bE0HktvWxzwNt6cK1gen6QihDrCrhv0MaTugiE7JFNFMryDGB2TrexSmTrnG7Tc7oNAfx0oZ6nInjGRyZ7fjCX8v%2FeQsBDSwJe5AvPUhgFOs7rsiTg8yFFed8ZiN2YPPFb8cLbZsquYbYGuvT8IBrDWmDV3e8iICE01qMLvODtDuOkQSwWUsfTFo%2BwgZnYzFFK6hJhV%2Fk%2BY69S%2BsRclmvqdpZoh6Hbet4lAf%2FiqLutZSmDd90Pdz7YeX7wHno5EAcAi6G164%2Bov0x%2BUJ64gVDcX3k%2FtJZgISJ0uAFvvMprjDQMvgOya2r%2Fdk63i3O6vZiZXPAWf2sj4LJ2bqU%2Fi3j97lLAS3Uc4vLBQnkYOnLteSsI%2BAuy5ZD8ZRqx4X0O4xj%2FsYz9V5Vxf063%2FhANs3e6k0vPXtcJeklAs2u0hksJbXtLzxgZeiYhRn5uvVjll%2FqWVkKWLW9RvuvOVv1qeJ%2FPNtd1z%2Bk2VNib%2B%2BT5gS%2Bi76Qu8zmhwuj9LO17rKl%2Frd0DwlQ%2BE4EMeuwjixhVnQmwQxZpS4f8DO9GVuc7zcF8rZZwaMsLL2C63Wwq4dB4rJUpE3Xdc39Etj3qqPhdNkLnKLVvmzXbRFPAD3CTtLNAFsVrOiUr996Lyx2%2BRQFPCmVoDI9Ku0eeH2yQJQnqRESePD%2BIufVsNGI%2BSofvR833H9jcgxCc1gltNZOVqRCHI6%2FWKm9pD%2BCnc7qNdPINzul2c063PrLErvdokUQnIlZcTz4hC%2FnuFb%2FiJJm4M40oS%2BgiaScXQ4W3LvPEsDxJrlSfhxbjJi4I%2BB5Zwt5Osfw78dQOFvoWIb2J%2BNgsSv8K26womLaPfjT16h9Ms4wHYBQt8P0Wu4%2FndDtr40GJAMWSUPczzO5wX5UM6Lmsxc8A%2FKLwnVFhD7QKry63DJ7T7VpRBL%2BUs%2BoL9enD7PKeTcGL3sMgw1jer7sld8m1cTIkEe8bXcG6dhG3emJQy%2B1mo%2FM4xEONS57uL7bPLRdhnBt4jmGhXN%2BEfSWbe35ByD%2BKaMZQD%2B130YaqvxHXiZ%2BE23UiHCu8LcPldXk0bMsdsiUW0zFLSK8i3vftVTvH7x%2BD6PzlTThK2jM1DBZj8jhq1kfnrk7ckrbSMZAWhbJFVW0tf%2Bcjy5jPM6p%2FhSwDiDerunXwtaODe1SvFp42CL5OPy2uw9s4HnWtGVlZgBBH6Ca2TUb2fNd27Krzc3s1TzMq941RnKdeIeBG4VVDI%2FRRs60P4lHXtdfxQl%2FQaYtO2k2O%2BlW9lfCDJIZVGasmBseLDSNN8xkAS5n1hNR54kxWG4fneFew6K0ltNUQdfy5PgX8FQM7gUm4rzDcdJ4zxHBvJtT5rfUF46WNEdyWtWZ7zDmLEVcinmp2Rn9Ez5deUVsVw6uu7zJWDXmWmQ55sqoQ8Odzup0P%2BKKcNvcVh5oeapd1oONF20qafLG51UuiAzpjZEzzJhmZiOuuq%2FbZGWeaA%2B2aRHzVlcd7jdvNxLgoC3g48DZfGz7rDHoh3KTLh5L%2BpZOYZqO%2Fu4g06MydFHEyGBHvM7lNJ3Fqfy2NVEpoe%2B3IODFdc18OLVpTcdToGAQcHRpSSQ%2FPpvObi45%2Fb8j1Rsg3vDPoiGMR8WsaYEUv3JczpLtA65jbkohEQ6i4ipPKPp%2FT7WoEbb5vEeLWEb1TT0cT6%2FzmxPODRZukNEeG77UlzpIxivg53aaa2ch9irjOkYdXIeKlhDZIO00HXuxBiHjNUaP%2BSJp%2BY%2FjMvmb%2FGMuthAt0m3w35Loj5BtPPJ8wPqgKqecHd10nA0lIWYdr8cSLCW0HdJ%2BsN8MIz1O%2FcFb4o%2BcHq0vbtgZC2qK9Bi9EcumMzkfmnK4JqRfxtYaI5wOqa6tYZ3J6GXDGsS7F0O%2B862Q9uQbzk6E33ouIK1z2EXl%2BkAz8hruuRLzPcaITAZz24TwQMnR%2BFKs4hV62aB8nEOlY4vE1NE5PCW1VdWmy3ayX89QVb%2Bua4MKxniNH12NNRmSozEAI%2BV7EDYRv3kNZVX%2Fz4OrozJ698F4Mk5bbzaKOBTyC%2Bm1d9%2BANU33DuxAIsSXisn6pui1rKrc%2FdemRDukSh67464S2nu%2FrHvx56p4fxACeND%2F2oct%2B3BG6QtdneHpMZ1QQMnhPvOz5NRH25JE2eeHxNTSMhIUnfXrhBQMvhdntZhN0sPQiAr40%2FPi1hdWnmm3LDGtCrkXE5RYj1cn6sYs1z4otVl0YFkOw%2BEMLnvAQvPGoQwHfQy%2B3Izc0NpwKCCHX4Inn4qGayBR1UMYV1LY4fW64SlHH2%2BpVxMU4yo%2FNfB3C8bFStyaX5bg8T%2F2hJOBzMfh0E%2FEeZD39GjiBEHK7Ii6JTKqe79Jg%2F7aumKmE0vcKp3CNKbO194Q2y9546Lhcf10lKv3X5PeeXPblDtlpjrE%2BlxK4XYwQB5547nW9V%2FwOlyITK3jhB6hlro%2FGEy%2BI0NDW%2BGNDT8%2FleerPKF0lKrsTPht81%2BZKt50N1bjlejwhLkRcJsJYUcjvPT%2BwvmYrh4w03cR0ArBoOgBCJmadI1vnfTXIkBLaKvrEEebrxy688f053YZV7S%2BRGd1LcKYYRv4BvVtCSDsR1xTyDyI%2BNoWs6ZSwPYCZYnatbob0tMfQaljyfIfGkELqR4V2140cLG325RF4t%2F6IogAJp2xCNES8IOS%2FKEyGX2xMfoonbr1A7wjSqEOxavPsfiH68DLE%2B9DFaDK55nXatThK%2FZncWLYe2nWqVyriuksXjDIQoiviMhluxGpu2r7zxfMDo3VFzw%2FuPD%2FYNAj4CcCv53S7UD1DWbYgmdz69SCf7ZKi4Ax529NQE9zqjNBnzY%2BNeduZroiPJpmPe9oJMRTx3Ks5p9s5svD6pa1GjwBSzw8iFTH3%2FMCX7T2pfLaOZ2ThcyUB8fxgIfduL1vUz9Lzg6TDU71ykTsN%2FNCaDUZ0nroYR7rRg%2FsxbjuT6IPOVsA%2BRVznt19BCPmOdyaejXjMoUyO0xpP5gnZtp1XZGtZKd4uPJghC%2BPN0Zxw9gxgrWKFS4LdDGbXZ9YKj4hPPpEcpTyJzYYYckJbRR84Sh8wMZCirj1yKW8I4A%2FNjz7JbWfJyMa1ztXCfd4OphOxG1sbEDJMEc8nRWQh1bV4qflrUieCmj%2BxFyHbaK4Lf3BcX%2Flz7BxMKkVvPx5B31kbiviiD9GQ%2B6t%2Fhf61qhvPD%2FyRXYEZY%2FhXC0NzXuCpeoTYEvHS5LjJB5iczDUveNoq27oO4qHnwpi0mDB%2F7qjeUptfJiHmfCnhMIa1PxHFPfS27gFv56nHPZR5LX30UbO8Mfq5frdN2%2Bjc1d25iGvu%2FjhwPZwQRyJemjySKg9VBuxdxXvh4PfHSDhSj2MN9as%2Fi6x6jDaEYjDqJDs%2Ben6wUs3HGJA3rnqr2wJmWfxtmGv2M0JIBT928SPndLs7p9uk%2BGLV14r4mOrG1OC4d3ieelNfND2W9dPIjmVdQz35sI9zEVTb4IRxLC8Rcr0iTuqRnILpGEVcBPHF8ONhj%2BVOAHw08W7HcixrIW9lcO0hy0eqyzDrkeUjEEIRvzGKYcz9CCcsUy9p2acgntNtBP1tS%2Ffo5uY%2Bm9646nazsMP2UDUYDmAonRCK%2BIC98Dm%2BzdBNx%2FYMkthoev3lqufimxzL%2BqHDcwNseOOqdTzp0BtX%2FZ0VvXBCKOJj8mLHmoGbmIp4z964zrW737TbWI5lFSNL9cS6yHV7yH59laTCZyk7IYQiPkgvPKqYzPyRPo6piE%2F69sYN18fHdiyr6ol1TttDDASV8Pge%2FUdpCKGIk9rJbI7q7T%2BzkT5SmwjCqm%2Bv1nR93PHZ%2BnPLEYc51JYOnhxmqsdoPknxhNL98FfCDIRQxK9CwGcXvLjetl61pE0INj9MxSQaYTP0a5JAtdQ8X703Y0VTyDe2w%2BoSRm86ZEdZwHUNDUeGyWwMbU8o4sSugCcN3sgYs3Hbhj4fPD%2FIt2%2FprFHf23qAFuuvTxpCrmOgWU%2Bek1PPZmgOrU8BJLaEXPF64T2yC452DurSSX1qivj9iK%2B3JQPmh69fv7IWuhHw%2FKhRlYtZXgCEYwgpSkh52WMR3tu48U0E6%2F%2B2%2BIqLbSYRlt%2F7eLaaZ40VPOM9Woa2PT9Yofm8eq3%2BLuXXPXXvBMDaGfgiyH%2Fq9pFzuh3N8b2EIk7evO8Ieud1A9ke2QjZJTDHAT5XKB74fc9FyUOwu5bPY8MYOSGLpMTFi3sKSygm99p%2FhKMDT0RgowbD8iQCu9H8bl%2Fq4tHmd8v3bgz73R7ZtrXEwpiODcvwImVIOTsSivgwRdtHFrrL%2Fzu18LX5da4QDyTt4kIIeRYfWdjwTl4z6N9K1wXFOkovGT%2BFs%2FzzZ7PVTmWB%2BgeAHwD8Owvft8fbRUF5P0jainshY3ypUL9xU2RA6nal8H2fAUSXyi%2FfNS%2F0vbklo%2FGAt%2BuRj2i4LVGiaDPLZdhLGY7SjgkIoYgPQsQjqF88YSxY53Q7v5JnccXPdROj5wfJQA0Ra89oaLBFqL9SuCzoOxEgFIy7mYJXH0tkIVUoU1ft9FF2KNSVw%2FkkeU63P3D2JCa8YxVYJ4X%2BdiVddlf0LEX%2BWbzXs4XvOg6g%2Fv61PMvZ0fdbC7GLqIaF5MIF6kPhDxriekIW%2Ft4YJA922c%2BbjBZC6IkTQsaFJOTN8O2yyn2D2CUijDveA06IW%2F4%2F8ZUaDnDh9PcAAAAASUVORK5CYII%3D" alt="UA logo"> <p></p>

	<!-- Buttons -->
	<?php

		// Making sure there's some space
		print "<br>";

		// Button to go the Basic Database Interaction page
		//print "<div id=\"button\" align=\"center\" class=\"btn btn-primary\"><a href=" . getLocation("DatabaseInteraction.php") . "><button>Go to Basic Database Page</button></a></div>"; // Old
		print "<button type=\"button\" class=\"btn btn-primary\" onclick=location.href='DatabaseInteraction.php'>Go to Basic Database Page</button>";

		// Making sure there's some space
		print "<br><br>";

		// Button to go the Advanced Database Interaction page
		//print "<div id=\"button\" align=\"center\" class=\"btn btn-primary\"><a href=" . getLocation("AdvancedDatabaseInteraction.php") . "><button>Go to Advanced Database Page</button></a></div>"; // Old
		print "<button type=\"button\" class=\"btn btn-primary\" onclick=location.href='AdvancedDatabaseInteraction.php'>Go to Advanced Database Page</button>";

	?>

</center>

</body>
</html>